<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
	public function getAll()
	{
		$result = DB::table('news')->where('active',1)->take(4)->get();
		return $result;
	}
	public function getNewsnew()
	{
		$result = DB::table('news')
		->orderBy('id','desc')
		->where('active',1)
		->take(6)->get();
		return $result;
	}
	public function getNewshot()
	{
		$result = DB::table('news')
		->where('active',1)
		->orderBy('view','desc')
		->take(7)->get();
		return $result;
	}
	
}