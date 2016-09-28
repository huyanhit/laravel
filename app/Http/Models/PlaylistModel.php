<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class PlaylistModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }
	public function getPlaylist()
	{
		$result = DB::table('Playlist')->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,60);
            $result[$key]->desc = strip_tags($result[$key]->desc);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/video-default.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,3,2,'fileIMG',200);
                $result[$key]->image = url('/').'/public/uploads/fileIMG/'.$result[$key]->image;
            }
        }
        return $result;
    }
	public function getPlaylistbyID($id)
	{
		$result = DB::table('playlist')->where('active',1)->where('id',$id)->first();
        if(empty($result->image) || !file_exists('public/uploads/'.$result->image)){
            $result->image = url('/').'/public/images/video-default.jpg';
        }else{
            $this->myFunction->cropImage(url('/').'/public/uploads/'.$result->image,1,1,'fileIMG',200);
            $result->image = url('/').'/public/uploads/fileIMG/'.$result->image;
        }
		return $result;
	}
    public function getrecentPlaylist($id = 0){
        $result = DB::table('playlist')
        ->where('id', '!=' , $id)
        ->orderby('id','desc')->take(4)->get();
        foreach ($result as $key => $val) {
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1,1,'playlistRC',200);
                $result[$key]->image = url('/').'/public/uploads/playlistRC/'.$result[$key]->image;
            }
        }
        return $result;
    }
}