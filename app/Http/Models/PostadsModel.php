<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class PostadsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('ads')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('ads')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function insertads($data)
	{	
		$result = DB::table('ads')->insertGetId($data);
		return $result;
	}
	public function updateads($data,$id)
	{	
		$result = DB::table('ads')->where('id',$id)->update($data);
		return $result;
	}
	public function getadsbyId($id){
		$result = DB::table('ads')->where('id', $id)->first();
		return $result;
	}
	public function getCatads()
	{
		$result = DB::table('catads')->where('active',1)->get();
		return $result;
	}
	public function getTypeads()
	{
		$result = DB::table('typeads')->where('active',1)->get();
		return $result;
	}
	public function getLocation()
	{
		$result = DB::table('location')->where('active',1)->get();
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM ads WHERE id = ?",[$id]);
		return $result;
	}
}