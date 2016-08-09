<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class JobsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('jobs')
			->where('catjobs', 'like', isset($data["filter"]["catjobs"])?$data["filter"]["catjobs"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('jobs')
			->where('catjobs', 'like', isset($data["filter"]["catjobs"])?$data["filter"]["catjobs"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM jobs WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('jobs')
            ->where('id', $id)
            ->update(['active' => $active]);
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
}