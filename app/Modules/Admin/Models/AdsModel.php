<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class AdsModel extends Model
{
	function __construct() {
       $this->table = "ads";
   	}

	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table($this->table)
			->where('catads', 'like', isset($data["filter"]["catads"])?$data["filter"]["catads"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table($this->table)
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
		$result = DB::delete("DELETE FROM ".$this->table." WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table($this->table)
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertData($data)
	{	
		$result = DB::table($this->table)->insertGetId($data);
		return $result;
	}
	public function updateData($data,$id)
	{	
		$result = DB::table($this->table)->where('id',$id)->update($data);
		return $result;
	}
	public function getbyId($id){
		$result = DB::table($this->table)->where('id', $id)->first();
		return $result;
	}
}