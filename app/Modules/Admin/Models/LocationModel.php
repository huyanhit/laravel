<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
	public function getAll()
	{
		$data = DB::table('location')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM location WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::delete("UPDATE location SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}