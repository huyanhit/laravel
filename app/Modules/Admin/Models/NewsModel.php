<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{

	public function getAll()
	{
		$news = DB::table('news')->get();
		return $news;
	}
}