<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class TypejobsModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('typejobs')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM typejobs WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::delete("UPDATE typejobs SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}