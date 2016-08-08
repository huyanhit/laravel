<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class HeaderlineModel extends Model
{
	public function getAll()
	{
		$result = DB::table('news')->get();
		return $result;
	}
	
}