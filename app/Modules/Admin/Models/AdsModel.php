<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AdsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('ads')
			->where('catads', 'like', isset($data["filter"]["catads"])?$data["filter"]["catads"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('ads')
			->where('catads', 'like', isset($data["filter"]["catads"])?$data["filter"]["catads"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM ads WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('ads')
            ->where('id', $id)
            ->update(['active' => $active]);
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
}