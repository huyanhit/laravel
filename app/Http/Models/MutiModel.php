<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class MutiModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }
	public function getAll()
	{
		$result = DB::table('Muti')->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'fileIMG',200);
                $result[$key]->image = url('/').'/public/uploads/fileIMG/'.$result[$key]->image;
            }
        }
        return $result;
    }


	public function getCatmuti()
	{
		$result = DB::table('catmuti')->where('active',1)->get();
		return $result;
	}
	public function getMutibyID($id)
	{
		$result = DB::table('muti')->where('active',1)->where('id',$id)->first();
		if(empty($result->image) || !file_exists('public/uploads/'.$result->image)){
            $result->image = url('/').'/public/images/no-image.jpg';
        }else{
            $this->myFunction->cropImage(url('/').'/public/uploads/'.$result->image,1,1,'fileIMG',200);
            $result->image = url('/').'/public/uploads/fileIMG/'.$result->image;
        }
		return $result;
	}
	public function getTypemutibyId($id)
	{
		$result = DB::table('muti')->where('active',1)->where('id',$id)->get();
		return $result;
	}
	public function getTypemuti()
	{
		$result = DB::table('typemuti')->where('active',1)->get();
		return $result;
	}
	
}