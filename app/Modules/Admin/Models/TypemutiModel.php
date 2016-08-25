<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TypemutiModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('typemuti')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM typemuti WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE typemuti SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}