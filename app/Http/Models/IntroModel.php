<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class IntroModel extends Model
{
	public function getAll()
	{
		$result = DB::table('news')->where('active',1)->take(10)->get();
		return $result;
	}
	
}