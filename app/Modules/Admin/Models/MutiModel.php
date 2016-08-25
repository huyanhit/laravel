<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class MutiModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('muti')
			->where('catmuti', 'like', isset($data["filter"]["catmuti"])?$data["filter"]["catmuti"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('muti')
			->where('catmuti', 'like', isset($data["filter"]["catmuti"])?$data["filter"]["catmuti"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM muti WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('muti')
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertmuti($data)
	{	
		$result = DB::table('muti')->insertGetId($data);
		return $result;
	}
	public function updatemuti($data,$id)
	{	
		$result = DB::table('muti')->where('id',$id)->update($data);
		return $result;
	}
	public function getmutibyId($id){
		$result = DB::table('muti')->where('id', $id)->first();
		return $result;
	}
}