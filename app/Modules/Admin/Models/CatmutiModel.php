<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CatmutiModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('catmuti')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM catmuti WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE catmuti SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}