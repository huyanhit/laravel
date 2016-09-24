<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Models\PlaylistmutiModel;

class PlaylistModel extends Model
{	
	function __construct()
	{
		$this->playlistmutiModel = new PlaylistmutiModel();
	}
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
	private function insertPlaylistmuti($data){
		DB::table('mutiplaylist')->insertGetId($data);
	}
	public function insertPlaylist($data,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table('playlist')->insertGetId($data);
		foreach($array as $val){
			$insert =[  'mtid' => $val,
						'plid' => $result ];
			$this->playlistmutiModel->insertPlaylistmuti($insert);
		}
		return $result;
	}
	public function updatePlaylist($data,$id,$str)
	{	
		$str = substr($str, 0, -1);
		$array = explode(',', $str);
		$result = DB::table('playlist')->where('id',$id)->update($data);
		// DB::table('mutiplaylist')
		// ->where('mtid', $id)
		// ->delete();
		$this->playlistmutiModel->deletemutiplaylistbymtID($id);
		foreach($array as $val){
			$insert =[ 
					'mtid' => $id,
					'plid' => $val];
			$this->playlistmutiModel->insertPlaylistmuti($insert);
		}
		return $result;
	}
	public function getplaylistbyId($id){
		$result = DB::table('playlist')->where('id', $id)->first();
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
}