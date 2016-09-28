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
    public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('ads')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('ads')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function insertads($data)
	{	
		$result = DB::table('ads')->insertGetId($data);
		return $result;
	}
	public function updateads($data,$id)
	{	
		$result = DB::table('ads')->where('id',$id)->update($data);
		return $result;
	}
	public function getadsbyId($id){
		$result = DB::table('ads')->where('id', $id)->first();
		return $result;
	}
	
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM ads WHERE id = ?",[$id]);
		return $result;
	}
	public function getAds()
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
	            }else if( $idtype == 3 || $idtype == 7 || $idtype == 10){
	            	$this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'ads',400);
		            $result[$key]->image = url('/').'/public/uploads/ads/'.$result[$key]->image;
		            $result[$key]->totaldisplay = 2;
		        }else if( $idtype == 4 || $idtype == 11){
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,2,3,'adslong',400);
	                $result[$key]->image = url('/').'/public/uploads/adslong/'.$result[$key]->image;
	                $result[$key]->totaldisplay = 3;
	            }else{
	            	$result[$key]->image = '';
	            }
	        }
	        if( $idtype == 1 || $idtype == 2 || $idtype == 3 || $idtype == 4){
	        	$result[$key]->display = 1;
	        	$result[$key]->totaldisplay += 1;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,50);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
	        }else if( $idtype == 5 || $idtype == 6 || $idtype == 7){
	        	$result[$key]->display = 2;
	        	$result[$key]->totaldisplay += 2;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,100);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,200);
	        }else if( $idtype == 8){
	        	$result[$key]->display = 3;
	        	$result[$key]->totaldisplay += 3;
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
        return $result;
    }

    public function getTotaldisplay($array){
    	$total = 0;
    	for($i=0 ; $i < count($array); $i++){
			$total += $array[$i]->totaldisplay;
		}
		return ceil($total/4);
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
	public function getpopularAds(){
		$result = DB::table('ads')->where('active',1)->where('typeads',7)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
	        $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,80);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
	        if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
	            $result[$key]->image = url('/').'/public/images/no-image.jpg';
	        }else{
	            $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'adsPO',400);
	            $result[$key]->image = url('/').'/public/uploads/adsPO/'.$result[$key]->image;
	            $result[$key]->totaldisplay = 2;
	        }
	    }
	    return $result;
	}
	public function getrecentAds($id){
		$arrayads = $this->getadsbyId($id);
		$result = DB::table('ads')
		->where('catads', $arrayads->catads)
		->where('id', '!=' , $id)
		->orderby('id','desc')->take(4)->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'adsRC',200);
                $result[$key]->image = url('/').'/public/uploads/adsRC/'.$result[$key]->image;
            }
        }
        return $result;
	}
}