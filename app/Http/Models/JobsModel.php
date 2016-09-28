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
    
    public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('jobs')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('jobs')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}

	public function insertjobs($data)
	{	
		$result = DB::table('jobs')->insertGetId($data);
		return $result;
	}

	public function updatejobs($data,$id)
	{	
		$result = DB::table('jobs')->where('id',$id)->update($data);
		return $result;
	}

	public function getjobsbyId($id){
		$result = DB::table('jobs')->where('id', $id)->first();
		return $result;
	}

	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM jobs WHERE id = ?",[$id]);
		return $result;
	}

	public function getJobs()
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
	public function getpopularJobs()
	{
		$result = DB::table('jobs')->where('active',1)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
	        $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
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
	public function getrecentJobs($id){
		$arrayjobs = $this->getjobsbyId($id);
		$result = DB::table('jobs')
		->where('catjobs', $arrayjobs->catjobs)
		->where('id', '!=' , $id)
		->orderby('id','desc')->take(4)->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'jobsRC',200);
                $result[$key]->image = url('/').'/public/uploads/jobsRC/'.$result[$key]->image;
            }
        }
        return $result;
	}
}