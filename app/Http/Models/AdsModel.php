<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class AdsModel extends Model
{
	public function __construct()
    {
        $this->images = 'ads';
        $this->thum_images = 'thum_ads';
        $this->myFunction = new MyFunction();
        $this->dirimage = '/public/uploads/image/';
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
	public function insertAds($data)
	{	
		$result = DB::table('ads')->insertGetId($data);
		return $result;
	}
	public function updateAds($data,$id)
	{	
		$result = DB::table('ads')->where('id',$id)->update($data);
		return $result;
	}
	public function getAdsById($id){
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
        $images =  $this->images;
		$result = DB::table('ads')->where('active',1)->orderby('id','desc')->paginate(20);
		foreach ($result as $key => $val) {
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
	        $idtype = $result[$key]->typeads;
	        $result[$key]->totaldisplay = 0;
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$this->images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
	            if( $idtype == 2 || $idtype == 6 || $idtype ==8 || $idtype ==9){
                    $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image,2,1,$this->thum_images,300);
                    $result[$key]->totaldisplay = 1;
	            }else if( $idtype == 3 || $idtype == 7 || $idtype == 10){
                    $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image,1,1,$this->thum_images,300);
                    $result[$key]->totaldisplay = 2;
		        }else if( $idtype == 4 || $idtype == 11){
                    $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image,2,3,$this->thum_images,300);
	                $result[$key]->totaldisplay = 3;
	            }else{
	            	$result[$key]->image = '';
	            }
	        }
	        if( $idtype == 1 || $idtype == 2 || $idtype == 3 || $idtype == 4){
	        	$result[$key]->display = 1;
	        	$result[$key]->totaldisplay += 1;
                $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,50);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
	        }else if( $idtype == 5 || $idtype == 6 || $idtype == 7){
	        	$result[$key]->display = 2;
	        	$result[$key]->totaldisplay += 2;
                $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,100);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,200);
	        }else if( $idtype == 8){
	        	$result[$key]->display = 3;
	        	$result[$key]->totaldisplay += 3;
                $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,200);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,255);
	        }else{
	        	$result[$key]->display = 0;
                $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        	$result[$key]->title = $this->myFunction->trimText($result[$key]->title,200);
           		$result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,255);
	        }
        } 
        $total = $this->getTotalDisplay($result);
        $result = $this->masoryCol($result,$total);
        return $result;
    }

    public function getTotalDisplay($array){
    	$total = 0;
    	for($i=0 ; $i < count($array); $i++){
			$total += $array[$i]->totaldisplay;
		}
		return ceil($total/4);
    }
    
	private function masoryCol($array,$group){
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
							$haschange = $this->changePosArray($array,$k,$n);
							$br = true;
							break;
						}
					}
					if(!$haschange){
						$subdisplay = 0;
						for($n = $i+1; $n < count($array); $n++){
							if($total - $array[$k]->totaldisplay + $array[$n]->totaldisplay+$subdisplay < $group){
								$this->changePosArray($array,$k,$n);
								$subdisplay += $array[$n]->totaldisplay;
							}
							if($total - $array[$k]->totaldisplay + $array[$n]->totaldisplay+$subdisplay == $group){
								$haschange = $this->changePosArray($array,$k,$n);
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
	private function changePosArray(&$array,$posX,$posY){
		$tam = $array[$posX];
		$array[$posX] = $array[$posY];
		$array[$posY] = $tam;
		return true;
	}
	public function getPopularAds(){
		$result = DB::table('ads')->where('active',1)->where('typeads',7)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,80);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$this->images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result[$key]->image,1,1,$this->thum_images,300);
                $result[$key]->totaldisplay = 2;
            }
	    }
	    return $result;
	}
	public function getRecentAds($id){
		$arrayads = $this->getadsbyId($id);
		$result = DB::table('ads')
		->where('catads', $arrayads->catads)
		->where('id', '!=' , $id)
		->orderby('id','desc')->take(4)->get();
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$this->images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result[$key]->image,1,1,$this->thum_images,300);
            }
        }
        return $result;
	}
	public function updateView($id){
		$view = DB::table('ads')->select('view')->where('id',$id)->first();
		$result = DB::table('ads')->where('id',$id)->update(array('view' => $view->view + 1));
		return $result;
	}
}