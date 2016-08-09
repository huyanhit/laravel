<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CatjobsModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('catjobs')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM catjobs WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE catjobs SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}