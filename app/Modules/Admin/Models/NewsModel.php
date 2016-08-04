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
<<<<<<< HEAD
		$result = DB::table('news')
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertNews($data)
	{	
		$result = DB::table('news')->insert($data);
<<<<<<< HEAD
=======
		return $result;
	}
	public function updateNews($data,$id)
	{	
		$result = DB::table('news')->where('id',$id)->update($data);
		return $result;
	}
	public function getnewsbyId($id){
		$result = DB::table('news')->where('id', $id)->first();
>>>>>>> 4f222c836957527156128fbe2a738fccb1d819c5
=======
		$result = DB::delete("UPDATE news SET active = ? WHERE id = ?",[$active,$id]);
>>>>>>> parent of 3ff4627... up
		return $result;
	}
}