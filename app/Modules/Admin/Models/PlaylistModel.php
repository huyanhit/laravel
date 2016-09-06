<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PlaylistModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('playlist')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('playlist')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM playlist WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('playlist')
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertplaylist($data)
	{	
		$result = DB::table('playlist')->insertGetId($data);
		return $result;
	}
	public function updateplaylist($data,$id)
	{	
		$result = DB::table('playlist')->where('id',$id)->update($data);
		return $result;
	}
	public function getplaylistbyId($id){
		$result = DB::table('playlist')->where('id', $id)->get();
		return $result;
	}
	public function completePlaylist($search){
		$result = DB::table('muti')
		->select('id','title')
		->where('file','like',$search.'%')
		->orwhere('title','like',$search.'%')
		->get();
		$html = '';
		foreach ($result as $value) {
			$html .= '<li><span>'.$value->title.' </span><button val='.$value->id.'>Add</a></li>';
			//print_r($value);
		}
		return $html;
	}
}