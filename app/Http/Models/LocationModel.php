<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
	public function getLocation()
	{
		$result = DB::table('location')->where('active',1)->get();
		return $result;
	}
}