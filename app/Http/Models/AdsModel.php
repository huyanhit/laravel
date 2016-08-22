<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class AdsModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }
    

	public function getAll()
	{
		$result = DB::table('ads')->where('active',1)->orderby('id','desc')->paginate(20);
		foreach ($result as $key => $val) {
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
	        $idtype = $result[$key]->typeads;
	        $result[$key]->totaldisplay = 0;
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
	            if( $idtype == 2 || $idtype == 6 || $idtype ==8 || $idtype ==9){
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,2,1,'adsshort',400);
	                $result[$key]->image = url('/').'/public/uploads/adsshort/'.$result[$key]->image;
	                $result[$key]->totaldisplay = 1;
	                //$total += 1;
	            }else if( $idtype == 3 || $idtype == 7 || $idtype == 10){
	            	$this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'ads',400);
		            $result[$key]->image = url('/').'/public/uploads/ads/'.$result[$key]->image;
		            $result[$key]->totaldisplay = 2;
		            //$total += 2;
	            }else if( $idtype == 4 || $idtype == 11){
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,2,3,'adslong',400);
	                $result[$key]->image = url('/').'/public/uploads/adslong/'.$result[$key]->image;
	                $result[$key]->totaldisplay = 3;
	                //$total += 3;
	            }else{
	            	$result[$key]->image = '';
	            }
	        }
	        if( $idtype == 1 || $idtype == 2 || $idtype == 3 || $idtype == 4){
	        	$result[$key]->display = 1;
	        	$result[$key]->totaldisplay += 1;
	        	//$total += 1;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,50);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
	        }else if( $idtype == 5 || $idtype == 6 || $idtype == 7){
	        	$result[$key]->display = 2;
	        	$result[$key]->totaldisplay += 2;
	        	//$total += 2;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,100);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,200);
	        }else if( $idtype == 8){
	        	$result[$key]->display = 3;
	        	$result[$key]->totaldisplay += 3;
	        	//$total += 3;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,200);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,255);
	        }else{
	        	$result[$key]->display = 0;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,200);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,255);
	        }
        } 
        $total = $this->getTotaldisplay($result);
        $result = $this->masorycol($result,$total);
  //       for($i=0 ; $i < count($result); $i++){
		// 	echo $result[$i]->totaldisplay;
		// }
        return $result;
    }

    public function getTotaldisplay($array){
    	$total = 0;
    	for($i=0 ; $i < count($array); $i++){
			$total += $array[$i]->totaldisplay;
		}
		return ceil($total/4);
    }

	public function getCatads()
	{
		$result = DB::table('catads')->where('active',1)->get();
		return $result;
	}
	public function getTypeadsbyId($id)
	{
		$result = DB::table('typeads')->where('active',1)->where('id',$id)->get();
		return $result;
	}
	public function getTypeads()
	{
		$result = DB::table('typeads')->where('active',1)->get();
		return $result;
	}
	public function getLocation()
	{
		$result = DB::table('location')->where('active',1)->get();
		return $result;
	}
	private function masorycol($array,$group){
		$total = 0;
		$gr = 0;
		$arraygr[$gr] = array();
		for($i=0 ; $i < count($array); $i++){
			$total += $array[$i]->totaldisplay;
			if($total < $group){
				array_push($arraygr[$gr],$array[$i]);
				continue;
			}
			if($total == $group){
				array_push($arraygr[$gr],$array[$i]);
				$gr += 1;
				$arraygr[$gr] = array();
				$total = 0;
			}
			$br = false;
			if($total > $group){
				for($k = $i; $k > $i - count($arraygr[$gr]); $k--){
					$haschange = false;
					for($n = $i+1; $n < count($array); $n++){
						if($total - $array[$k]->totaldisplay + $array[$n]->totaldisplay == $group){
							$haschange = $this->changeposarray($array,$k,$n);
							$br = true;
							break;
						}
					}
					if(!$haschange){
						$subdisplay = 0;
						for($n = $i+1; $n < count($array); $n++){
							if($total - $array[$k]->totaldisplay + $array[$n]->totaldisplay+$subdisplay < $group){
								$this->changeposarray($array,$k,$n);
								$subdisplay += $array[$n]->totaldisplay;
							}
							if($total - $array[$k]->totaldisplay + $array[$n]->totaldisplay+$subdisplay == $group){
								$haschange = $this->changeposarray($array,$k,$n);
								$br = true;
								break;
							}
						}
					}
					if($br) break;
				}
				$gr += 1;
				$arraygr[$gr] = array();
				$total = 0;
			}
		}
		return $array;
	}
	private function changeposarray(&$array,$posX,$posY){
		$tam = $array[$posX];
		$array[$posX] = $array[$posY];
		$array[$posY] = $tam;
		return true;
	}
}