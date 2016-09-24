<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class TypeadsModel extends Model
{
	public function getTypeads()
	{
		$result = DB::table('typeads')->where('active',1)->get();
		return $result;
	}
	public function getTypeadsbyId($id)
	{
		$result = DB::table('typeads')->where('active',1)->where('id',$id)->get();
		return $result;
	}
}