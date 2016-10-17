<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatjobsModel extends Model
{
	public function getCatJobs()
	{
		$result = DB::table('catjobs')->where('active',1)->get();
		return $result;
	}
}