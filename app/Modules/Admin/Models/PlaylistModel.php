<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PlaylistModel extends Model
{	
	function __construct()
	{
		$this->table = "playlist";
	}
    public function getAll()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
	public function getData($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table($this->table)
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table($this->table)
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
		DB::table($this->table)->insertGetId($data);
	}

	public function updateData($data,$id)
	{
	    DB::table($this->table)->where('id',$id)->update($data);
	}

	public function getbyId($id){
		$result = DB::table($this->table)->where('id', $id)->first();
		return $result;
	}
	public function completeData($id,$search){
		$result = DB::table($this->table)
		->select('playlist.id','playlist.title','muti_playlist.muti_id')
        ->leftJoin('muti_playlist',function($join)use($id){
            $join->on('muti_playlist.playlist_id','=','playlist.id');
            $join->on('muti_playlist.muti_id','=',DB::raw("'".$id."'"));
        })
        ->where('playlist.title','like',$search.'%')
		->get();
        $html = '';
		foreach ($result as $value) {
            $check = '';
		    if($value->muti_id){
                $check = 'checked';
            }
			$html .= '<li><span class="title">'.$value->title.' </span><input type="checkbox" '.$check.' value="'.$value->id.'"></li>';
		}
		return $html;
	}
}