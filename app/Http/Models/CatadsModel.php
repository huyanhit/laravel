<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class CatadsModel extends Model
{
    function __construct() {
        $this->table = "catads";
    }

	public function getCatAds()
	{
		$result = DB::table('catads')->where('active',1)->get();
		return $result;
	}

    public function getAll()
    {
        $data = DB::table($this->table)->where('active', 1)->get();
        return $data;
    }
}