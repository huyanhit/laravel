<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
	public function getAll()
	{
		$result = DB::table('news')
		->where('active',1)
		->take(20)
		->orderby('id','desc')
		->get();
		return $result;
	}

	public function getNewsRss()
	{
		$result = DB::table('news')
		->where('catnews',1)
		->where('active',1)
		->orderBy('id','desc')
		->take(6)->orderby('id','desc')->get();
		return $result;
	}

	public function getNewsSL()
	{
		$result = DB::table('news')->where('active',1)->take(4)->orderby('id','desc')->get();
		return $result;
	}

	public function getNewsXL()
	{
		$result = DB::table('news')
		->where('catnews',2)
		->where('active',1)
		->orderBy('view','desc')
		->take(20)->orderby('id','desc')->get();
		return $result;
	}

	public function getNewsGL()
	{
		$result = DB::table('news')
		->where('catnews',3)
		->where('active',1)
		->orderBy('view','desc')
		->take(20)->orderby('id','desc')->get();
		return $result;
	}
	public function getnewsbyId($id){
		$result = DB::table('news')->where('id', $id)->orderby('id','desc')->first();
		return $result;
	}
}