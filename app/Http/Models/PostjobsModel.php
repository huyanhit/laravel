<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class PostjobsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('jobs')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('jobs')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
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