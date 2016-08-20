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
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,70);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,200);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
	        $idtype = $result[$key]->id;
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
	            if( $idtype == 8 || $idtype == 9 || $idtype == 10){
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,2,1,'ads',400);
	                $result[$key]->image = url('/').'/public/uploads/ads/'.$result[$key]->image;
	            }else if( $idtype == 2 || $idtype == 3 || $idtype == 6){
	            	$this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'ads',400);
		            $result[$key]->image = url('/').'/public/uploads/ads/'.$result[$key]->image;
	            }else if( $idtype == 5 || $idtype == 7){
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,2,3,'ads',400);
	                $result[$key]->image = url('/').'/public/uploads/ads/'.$result[$key]->image;
	            }else{
	            	$result[$key]->image = '';
	            }
	        }
	        if( $idtype == 1 || $idtype == 3 || $idtype == 7 || $idtype == 9){
	        	$result[$key]->display = 1;
	        }else if( $idtype == 4 || $idtype == 6 || $idtype == 10){
	        	$result[$key]->display = 3;
	        }else{
	        	$result[$key]->display = 0;
	        }
        } 
        return $result;
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
	
}