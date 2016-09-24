<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class TypejobsModel extends Model
{
	public function getTypejobs()
	{
		$result = DB::table('typejobs')->where('active',1)->get();
		return $result;
	}
}