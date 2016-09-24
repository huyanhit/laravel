<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatadsModel extends Model
{
	public function getCatads()
	{
		$result = DB::table('catads')->where('active',1)->get();
		return $result;
	}
}