<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class PlaylistmutiModel extends Model
{
	function __construct() {
       $this->table = "mutiplaylist";
   	}
	public function getmutiplaylistbyId($id){
		$result = DB::table($this->table)
 		->where('mtid', $id)
 		->join('playlist', 'mutiplaylist.plid', '=', 'playlist.id')
 		->select('playlist.title','playlist.id')
		->get();
		return $result;
	}
	public function getplaylistmutibyId($id){
		$result = DB::table($this->table)
 		->where('plid', $id)
 		->join('muti', 'mutiplaylist.mtid', '=', 'muti.id')
 		->select('muti.title','muti.id')
		->get();
		return $result;
	}
	public function insertData($data){
		DB::table($this->table)->insertGetId($data);
	}
	public function deletebymtID($id){
		DB::table($this->table)
		->where('mtid', $id)
		->delete();
	}
	public function deletebyplID($id){
		DB::table($this->table)
		->where('plid', $id)
		->delete();
	}
}