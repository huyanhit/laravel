<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class CatadsModel extends Model
{
	

	public function getAll()
	{
		$data = DB::table('catads')->get();
		return $data;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM catads WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		
		$result = DB::delete("UPDATE catads SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
	
}