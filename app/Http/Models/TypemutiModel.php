<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class TypemutiModel extends Model
{
	public function getTypeMuti()
	{
		$result = DB::table('typemuti')->where('active',1)->get();
		return $result;
	}
}