<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CatjobsModel extends Model
{
	
	function __construct() {
       $this->table = "catjobs";
   	}
	public function getAll()
	{
		$data = DB::table($this->table)->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM ".$this->table." WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE ".$this->table." SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}