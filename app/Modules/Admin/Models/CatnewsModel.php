<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CatnewsModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('catnews')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM catnews WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::delete("UPDATE catnews SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}