<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class HeaderlineModel extends Model
{
	public function getAll()
	{
		$result = DB::table('news')
		->where('catnews',4)
		->where('active',1)
		->orderBy('id','desc')
		->take(6)->orderby('id','asc')->get();
		return $result;
	}
	
}