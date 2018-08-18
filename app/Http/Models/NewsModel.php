<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class NewsModel extends Model
{
	public function __construct()
    {
        $this->images = 'news';
        $this->thum_images = 'thum_news';
        $this->myFunction = new MyFunction();
    }

	public function getNewsFrame($positions, $trimText, $trimDesc, $limit ,$rss = false , $dimX = 1, $dimY = 1, $scale = 400)
	{
        $images =  $this->images;

        $result = DB::table('news')
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
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/images/no-image.jpg', $dimX, $dimY, $this->thum_images, $scale);
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, $dimX, $dimY, $this->thum_images, $scale);
            }
        }

		return $result;
	}

	public function getNewsById($id){
		$result = DB::table('news')->where('id', $id)->where('active',1)->orderby('id','desc')->first();
		return $result;
	}

    public function getByCategory($id, $limit){
        $result = DB::table('news')->where('catnews', $id)->where('active',1)->orderby('id','desc')->take($limit)->get();
        return $result;
    }

    public function getPopularNews(){
        $images =  $this->images;
        $result = DB::table('news')->where('active',1)->take(4)->orderby('id','desc')->get();
        foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,100);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);

            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$images.'/'.$result[$key]->image)){
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/images/no-image.jpg', 1, 1, $this->thum_images);
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
                $result[$key]->totaldisplay = 2;
            }
        }
        return $result;
    }

	public function getRecentNews($id = 0){
        $images =  $this->images;
		$arraynews = $this->getNewsById($id);
		$result = DB::table('news')
		->where('catnews', $arraynews->catnews)
		->where('id', '!=' , $id)
        ->where('active',1)
		->orderby('id','desc')->take(4)->get();

		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$images.'/'.$result[$key]->image)){
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/images/no-image.jpg', 1, 1, $this->thum_images);
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
        }

        return $result;
	}

	public function updateView($id){
		$view = DB::table('news')->select('view')->where('id',$id)->first();
		$result = DB::table('news')->where('id',$id)->update(array('view' => $view->view + 1));
		return $result;
	}
}