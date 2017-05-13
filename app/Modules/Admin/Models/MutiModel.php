<?php 
namespace App\Modules\Admin\Models;

use DB; 
use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Models\PlaylistmutiModel;

class MutiModel extends Model
{
	function __construct()
	{
		$this->table = "muti";
		$this->playlistmutiModel = new PlaylistmutiModel();
	}
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table($this->table)
			->where('catmuti', 'like', isset($data["filter"]["catmuti"])?$data["filter"]["catmuti"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table($this->table)
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
	public function insertData($data,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table($this->table)->insertGetId($data);
		foreach($array as $val){
			$insert =[  'plid' => $val,
						'mtid' => $result];
			$this->playlistmutiModel->insertData($insert);
		}
		return $result;
	}
	public function updateData($data,$id,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table($this->table)->where('id',$id)->update($data);
		$this->playlistmutiModel->deletebymtID($id);
		foreach($array as $val){
			$insert =[ 
				'plid' => $val,
				'mtid' => $id];
			$this->playlistmutiModel->insertData($insert);
		}
		return $result;
	}
	public function getbyId($id){
		$result = DB::table($this->table)->where('id', $id)->first();
		return $result;
	}
	public function completeData($search){
		$result = DB::table($this->table)
		->select('id','title')
		->where('file','like',$search.'%')
		->orwhere('title','like',$search.'%')
		->get();
		$html = '';
		foreach ($result as $value) {
			$html .= '<li><span class="title">'.$value->title.' </span><span class="btn-add" val='.$value->id.'>Add</span></li>';
		}
		return $html;
	}
}