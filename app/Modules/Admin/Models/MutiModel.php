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
	public function insertmuti($data,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table('muti')->insertGetId($data);
		foreach($array as $val){
			$insert =[  'mtid' => $val,
						'plid' => $result ];
			$this->insertplaylistmuti($insert);
		}
		return $result;
	}
	private function insertplaylistmuti($data){
		DB::table('mutiplaylist')->insertGetId($data);
	}
	public function updatemuti($data,$id,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table('muti')->where('id',$id)->update($data);
		DB::table('mutiplaylist')
		->where('mtid', $id)
		->delete();
		foreach($array as $val){
			$insert =[ 
					'mtid' => $id,
					'plid' => $val];
			$this->insertplaylistmuti($insert);
		}
		return $result;
	}
	public function getmutibyId($id){
		$result = DB::table('muti')->where('id', $id)->first();
		return $result;
	}
	public function completeMuti($search){
		$result = DB::table('playlist')
		->select('id','title')
		->orwhere('title','like',$search.'%')
		->get();
		$html = '';
		foreach ($result as $value) {
			$html .= '<li><span class="title">'.$value->title.' </span><span class="btn-add" val='.$value->id.'>Add</span></li>';
		}
		return $html;
	}
	public function getplaylistmutibyId($id){
		$result = DB::table('mutiplaylist')
 		->where('mtid', $id)
 		->join('playlist', 'mutiplaylist.plid', '=', 'playlist.id')
 		->select('playlist.title','playlist.id')
		->get();
		return $result;
	}
}