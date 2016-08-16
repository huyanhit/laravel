<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class JobsModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }

	public function getAll()
	{
		$result = DB::table('jobs')->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,60);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
        } 
        return $result;
    }

	public function getJobsvip()
	{
		$result = DB::table('jobs')->where('active',1)->where('catjobs',1)->take(10)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,60);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'jobsvip',400);
                $result[$key]->image = url('/').'/public/uploads/jobsvip/'.$result[$key]->image;
            }
        }
        return $result;
    }

	public function getCatjobs()
	{
		$result = DB::table('catjobs')->where('active',1)->get();
		return $result;
	}
	public function getTypejobs()
	{
		$result = DB::table('typejobs')->where('active',1)->get();
		return $result;
	}
	public function getLocation()
	{
		$result = DB::table('location')->where('active',1)->get();
		return $result;
	}
	
}