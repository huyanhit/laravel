<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatmutiModel extends Model
{
	public function getCatMuti()
	{
		$result = DB::table('catmuti')->where('active',1)->get();
		return $result;
	}
}