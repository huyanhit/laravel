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

	public function getAll()
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
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$result[$key]->image,1,1,'newsRss',200);
                $result[$key]->image = './public/uploads/newsRss/'.$result[$key]->image;
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
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$result[$key]->image,1.5,1,'newsSL',400);
                $result[$key]->image = './public/uploads/newsSL/'.$result[$key]->image;
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
                $result[$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$result[$key]->image,1,1,'newsXL',200);
                $result[$key]->image = './public/uploads/newsXL/'.$result[$key]->image;
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
                $result[$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$result[$key]->image,1,1,'newsGL',200);
                $result[$key]->image = './public/uploads/newsGL/'.$result[$key]->image;
            }
        }
		return $result;
	}
	public function getnewsbyId($id){
		$result = DB::table('news')->where('id', $id)->orderby('id','desc')->first();
		return $result;
	}
}