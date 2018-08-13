<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;
use App\Http\Models\SystemDetailModel;

class JobsModel extends Model
{
	public function __construct()
    {
        $this->images = 'jobs';
        $this->thum_images = 'thum_jobs';
        $this->systemDetailCode   = new SystemDetailModel();
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

	public function insertJobs($data)
	{	
		$result = DB::table('jobs')->insertGetId($data);
		return $result;
	}

	public function updateJobs($data,$id)
	{	
		$result = DB::table('jobs')->where('id',$id)->update($data);
		return $result;
	}

	public function getJobsById($id){
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
        $positions = $this->systemDetailCode->getSystemCodeDetail('jobs_position','jobs_list');
		$result = DB::table('jobs')->where('positions',$positions)->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
        } 
        return $result;
    }

    public function getJobsFrame($positions, $trimText, $trimDesc, $limit ,$rss = false , $dimX = 1, $dimY = 1, $scale = 400)
    {
        $images =  $this->images;

        $result = DB::table('jobs')
            ->where('positions',$positions)
            ->where('active',1)
            ->take($limit)->orderby('id','desc')
            ->get();
        foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,$trimText);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,$trimDesc);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, $dimX, $dimY, $this->thum_images, $scale);
            }
        }
        return $result;
    }

	public function getPopularJobs()
	{
        $images =  $this->images;
		$result = DB::table('jobs')->where('active',1)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
	        $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
	    }
	    return $result;
	}

	public function getRecentJobs($id){
        $images =  $this->images;
		$arrayjobs = $this->getJobsById($id);
		$result = DB::table('jobs')
		->where('catjobs', $arrayjobs->catjobs)
		->where('id', '!=' , $id)
		->orderby('id','desc')->take(4)->get();
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
        }
        return $result;
	}

	public function updateView($id){
		$view = DB::table('jobs')->select('view')->where('id',$id)->first();
		
		$result = DB::table('jobs')->where('id',$id)->update(array('view' => $view->view + 1));
		return $result;
	}
}