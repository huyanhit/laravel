<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;

class HeaderlineModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }
	public function getAll()
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
                $data['headerline'][$key]->image = url('/').'/public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage(url('/').'/public/uploads/'.$result[$key]->image,1.5,1,'headerline',400);
                $result[$key]->image = url('/').'/public/uploads/headerline/'.$result[$key]->image;
            }
        }
		return $result;
	}
	
}