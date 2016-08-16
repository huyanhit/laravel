<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;


class IntroModel extends Model
{
	public function __construct()
    {
        $this->myFunction = new MyFunction();
    }
	public function getAll()
	{
		$result = DB::table('news')->where('active',1)->take(10)->get();
		foreach ($result as $key => $val) {
            $result[$key]->desc = $this->myFunction->trimText($result[$key]->desc,60);
        }
		return $result;
	}
	
}