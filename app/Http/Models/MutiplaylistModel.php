<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class MutiplaylistModel extends Model
{
	public function getmutiplaylistbyId($id)
    {
        $result = DB::table('mutiplaylist')
        ->where('plid', $id)
        ->join('muti', 'mutiplaylist.mtid', '=', 'muti.id')
        ->select('muti.*')
        ->get();
        return $result;
    }
}