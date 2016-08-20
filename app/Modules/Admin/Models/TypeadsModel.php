<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TypeadsModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('typeads')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM typeads WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE typeads SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}