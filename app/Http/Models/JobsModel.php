<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
	public function getAll()
	{
		$result = DB::table('jobs')->where('active',1)->orderby('id','desc')->paginate(10);
		return $result;
	}
	public function getJobsvip()
	{
		$result = DB::table('jobs')->where('active',1)->where('catjobs',1)->take(10)->orderby('id','desc')->get();
		return $result;
	}
	public function getCatjobs()
	{
		$result = DB::table('catjobs')->where('active',1)->get();
		return $result;
	}
	public function getTypejobs()
	{
		$result = DB::table('typejobs')->where('active',1)->get();
		return $result;
	}
	public function getLocation()
	{
		$result = DB::table('location')->where('active',1)->get();
		return $result;
	}
	
}