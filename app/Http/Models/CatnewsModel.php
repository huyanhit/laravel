<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatnewsModel extends Model
{
    function __construct() {
        $this->table = "catnews";
    }

	public function getCatNews()
	{
		$result = DB::table('catnews')->where('active',1)->get();
		return $result;
	}

    public function getAll()
    {
        $data = DB::table($this->table)->where('active', 1)->get();
        return $data;
    }
}