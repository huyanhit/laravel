<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class MutiplaylistModel extends Model
{
	public function getMutiPlayListById($id)
    {
        $result = DB::table('playlist')
        ->where('playlist.id', $id)
        ->join('muti_playlist', 'muti_playlist.playlist_id', '=', 'playlist.id')
        ->join('muti', 'muti_playlist.muti_id', '=', 'muti.id')
        ->get();

        foreach ($result as $key => $value){
            $result[$key]->type = '';
            if(trim($value->file) != ''){
                $cut_ext = strrpos($value->file,'.');
                $result[$key]->type = strtolower(substr($value->file,$cut_ext + 1));
                $result[$key]->file = url('/').'/public/uploads/file/'.$value->file;
            }else{
                $cut_ext = strrpos($value->link_file,'.');
                $result[$key]->type = strtolower(substr($value->link_file,$cut_ext + 1));
                $result[$key]->file = $value->link_file;
            }
        }
        return $result;
    }
}