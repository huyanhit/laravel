<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class PlaylistModel extends Model
{
	public function __construct()
    {
        $this->images = 'playlist';
        $this->thum_images = 'thum_playlist';
        $this->myFunction = new MyFunction();
    }
	public function getPlayList()
	{
		$result = DB::table('playlist')->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$this->images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
        }
        return $result;
    }
	public function getPlayListByID($id)
	{
		$result = DB::table('playlist')->where('active',1)->where('id',$id)->first();
        if(empty($result->image) || !file_exists('public/uploads/'.$this->images.'/'.$result->image)){
            $result->image = url('/').'/public/images/no-image.jpg';
        }else{
            $result->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result->image, 1, 1, $this->thum_images);
        }
		return $result;
	}
    public function getRecentPlayList($id = 0){
        $result = DB::table('playlist')
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
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
        }
        return $result;
    }
}