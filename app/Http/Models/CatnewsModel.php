<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatnewsModel extends Model
{
	public function getCatNews()
	{
		$result = DB::table('catnews')->where('active',1)->get();
		return $result;
	}
}