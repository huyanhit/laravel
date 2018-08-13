<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class MutiModel extends Model
{
	public function __construct()
    {
        $this->images = 'muti';
        $this->thum_images = 'thum_muti';
        $this->myFunction = new MyFunction();
    }
    
	public function getMuti()
	{
		$result = DB::table('muti')->where('active',1)->orderby('id','desc')->paginate(10);
		foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,80);
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

	public function getMutiById($id)
	{
		$result = DB::table('muti')->where('active',1)->where('id',$id)->first();

        if(empty($result->image) || !file_exists('public/uploads/'.$this->images.'/'.$result->image)){
            $result->image = url('/').'/public/images/no-image.jpg';
        }else{
            $result->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result->image, 1, 1, $this->thum_images);
        }

        $result->type = '';
        if($result->file != ""){
            $cut_ext = strrpos($result->file,'.');
            $result->type = strtolower(substr($result->file,$cut_ext + 1));
            $result->file = url('/').'/public/uploads/file/'.$result->file;
        }else{
            $cut_ext = strrpos($result->link_file,'.');
            $result->type = strtolower(substr($result->link_file,$cut_ext + 1));
            $result->file = $result->link_file;
        }

        return $result;

	}
	
	public function getTypeMutiById($id)
	{
		$result = DB::table('muti')->where('active',1)->where('id',$id)->get();
		return $result;
	}
    
    public function getRecentMuti($id = 0){
        $arraymuti = $this->getMutibyID($id);
        $result = DB::table('muti')
        ->where('catmuti', $arraymuti->catmuti)
        ->where('id', '!=' , $id)
        ->orderby('id','desc')->take(4)->get();

        foreach ($result as $key => $val) {
            $result[$key]->id = $this->myFunction->toSlug($result[$key]->title).'-'.$result[$key]->id;
            $result[$key]->title = $this->myFunction->trimText($result[$key]->title,40);
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,120);
            $result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);

            if(empty($result[$key]->image) || !file_exists('public/uploads/'.$this->images.'/'.$result[$key]->image)){
                $result[$key]->image = url('/').'/public/images/video-default.jpg';
            }else{
                $result[$key]->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$this->images.'/'.$result[$key]->image, 1, 1, $this->thum_images);
            }
        }
        return $result;
    }
}