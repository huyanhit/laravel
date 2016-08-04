<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('news')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('news')
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
		$result = DB::delete("DELETE FROM news WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('news')
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertNews($data)
	{	
		$result = DB::table('news')->insert($data);
<<<<<<< HEAD
=======
		return $result;
	}
	public function updateNews($data,$id)
	{	
		$result = DB::table('news')->where('id',$id)->update($data);
		return $result;
	}
	public function getnewsbyId($id){
		$result = DB::table('news')->where('id', $id)->first();
>>>>>>> 4f222c836957527156128fbe2a738fccb1d819c5
		return $result;
	}
}