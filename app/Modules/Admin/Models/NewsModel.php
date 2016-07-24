<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{

	public function getAll()
	{
		$news = DB::table('news')->paginate(10);
		return $news;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM news WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::delete("UPDATE news SET active = ? WHERE id = ?",[$active,$id]);
		return $result;
	}
}