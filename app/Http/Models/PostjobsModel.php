<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class PostjobsModel extends Model
{
	public function insertjobs($data)
	{	
		$result = DB::table('jobs')->insertGetId($data);
		return $result;
	}
	public function updatejobs($data,$id)
	{	
		$result = DB::table('jobs')->where('id',$id)->update($data);
		return $result;
	}
	public function getjobsbyId($id){
		$result = DB::table('jobs')->where('id', $id)->first();
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
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM jobs WHERE id = ?",[$id]);
		return $result;
	}
}