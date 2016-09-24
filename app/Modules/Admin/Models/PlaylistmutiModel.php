<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PlaylistmutiModel extends Model
{
	public function getmutiplaylistbyId($id){
		$result = DB::table('mutiplaylist')
 		->where('mtid', $id)
 		->join('playlist', 'mutiplaylist.plid', '=', 'playlist.id')
 		->select('playlist.title','playlist.id')
		->get();
		return $result;
	}
	public function getplaylistmutibyId($id){
		$result = DB::table('mutiplaylist')
 		->where('plid', $id)
 		->join('muti', 'mutiplaylist.mtid', '=', 'muti.id')
 		->select('muti.title','muti.id')
		->get();
		return $result;
	}
	public function insertPlaylistmuti($data){
		DB::table('mutiplaylist')->insertGetId($data);
	}
	public function deletemutiplaylistbymtID($id){
		DB::table('mutiplaylist')
		->where('mtid', $id)
		->delete();
	}
	public function deletemutiplaylistbyplID($id){
		DB::table('mutiplaylist')
		->where('plid', $id)
		->delete();
	}
}