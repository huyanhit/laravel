<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
	function __construct() {
       $this->table = "jobs";
   	}

	public function getData($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table($this->table)
			->where('catjobs', 'like', isset($data["filter"]["catjobs"])?$data["filter"]["catjobs"].'%':'%')
            ->where('positions', 'like', isset($data["filter"]["positions"])?$data["filter"]["positions"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
            ->where('active', 1)
			->paginate(10);
		}else{
			$result = DB::table($this->table)
			->where('catjobs', 'like', isset($data["filter"]["catjobs"])?$data["filter"]["catjobs"].'%':'%')
            ->where('positions', 'like', isset($data["filter"]["positions"])?$data["filter"]["positions"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
            ->where('active', 1)
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