<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class NewsModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }

	public function getNews()
	{
		$result = DB::table('news')
		->where('active',1)
		->take(20)
		->orderby('id','desc')
		->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title, 40);
        }
		return $result;
	}

	public function getNewsRss()
	{
		$result = DB::table('news')
		->where('catnews',1)
		->where('active',1)
		->orderBy('id','desc')
		->take(6)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            if(empty($result[$key]->image) || !file_exists('public/uploads/rootrss/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/rootrss/'.$result[$key]->image,1,1,'newsRss',200);
                $result[$key]->image = url('/').'/public/uploads/newsRss/'.$result[$key]->image;
            }
        }
		return $result;
	}

	public function getNewsSL()
	{
		$result = DB::table('news')->where('active',1)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,70);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,200);
            if($result[$key]->catnews == 1){
	            if(empty($result[$key]->image) || !file_exists('public/uploads/rootrss/'.$result[$key]->image)){
	                $result[$key]->image = url('/').'/public/images/no-image.jpg';
	            }else{
	                $this->myFunction->cropImage(url('/').'/public/uploads/rootrss/'.$result[$key]->image,1.5,1,'newsSL',400);
	                $result[$key]->image = url('/').'/public/uploads/newsSL/'.$result[$key]->image;
	            }
	        }else{
	        	if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
	                $result[$key]->image = url('/').'/public/images/no-image.jpg';
	            }else{
	                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1.5,1,'newsSL',400);
	                $result[$key]->image = url('/').'/public/uploads/newsSL/'.$result[$key]->image;
	            }
	        }
        }
		return $result;
	}

	public function getNewsXL()
	{
		$result = DB::table('news')
		->where('catnews',2)
		->where('active',1)
		->orderBy('view','desc')
		->take(20)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'newsXL',200);
                $result[$key]->image = url('/').'/public/uploads/newsXL/'.$result[$key]->image;
            }
        }
		return $result;
	}

	public function getNewsGL()
	{
		$result = DB::table('news')
		->where('catnews',3)
		->where('active',1)
		->orderBy('view','desc')
		->take(20)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'newsGL',200);
                $result[$key]->image = url('/').'/public/uploads/newsGL/'.$result[$key]->image;
            }
        }
		return $result;
	}
	public function getNewsById($id){
		$result = DB::table('news')->where('id', $id)->orderby('id','desc')->first();
		return $result;
	}
	public function getPopularNews(){
		$result = DB::table('news')->where('active',1)->take(4)->orderby('id','desc')->get();
		foreach ($result as $key => $val) {
	        $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            
            switch ($result[$key]->catnews) {
            	case 1:
            		$folder = 'rootrss/';
            		break;
            	default:
            		$folder = '';
            		break;
            }
	        if(empty($result[$key]->image) || !file_exists('public/uploads/'.$folder.$result[$key]->image)){
	            $result[$key]->image = url('/').'/public/images/no-image.jpg';
	        }else{
	            $this->myFunction->cropImage(url('/').'/public/uploads/'.$folder.$result[$key]->image,1,1,'newsPO',400);
	            $result[$key]->image = url('/').'/public/uploads/newsPO/'.$result[$key]->image;
	            $result[$key]->totaldisplay = 2;
	        }
	    }
	    return $result;
	}
	public function getRecentNews($id = 0){
		$arraynews = $this->getNewsById($id);
		$result = DB::table('news')
		->where('catnews', $arraynews->catnews)
		->where('id', '!=' , $id)
		->orderby('id','desc')->take(4)->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            switch ($result[$key]->catnews) {
            	case 1:
            		$folder = 'rootrss/';
            		break;
            	default:
            		$folder = '';
            		break;
            }
	        if(empty($result[$key]->image) || !file_exists('public/uploads/'.$folder.$result[$key]->image)){
	            $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$folder.$result[$key]->image,1,1,'newsRC',200);
                $result[$key]->image = url('/').'/public/uploads/newsRC/'.$result[$key]->image;
            }
        }
        return $result;
	}
	public function getHeadLine()
	{
		$result = DB::table('news')
		->where('catnews',4)
		->where('active',1)
		->orderBy('id','desc')
		->take(6)->orderby('id','asc')->get();
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,80);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1.5,1,'headerline',400);
                $result[$key]->image = url('/').'/public/uploads/headerline/'.$result[$key]->image;
            }
        }
		return $result;
	}
	public function getIntro()
	{
		$result = DB::table('news')->where('active',1)->take(10)->get();
		foreach ($result as $key => $val) {
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,60);
        }
		return $result;
	}

	public function updateView($id){
		$view = DB::table('news')->select('view')->where('id',$id)->first();
		
		$result = DB::table('news')->where('id',$id)->update(array('view' => $view->view + 1));
		return $result;
	}
}