<?php
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class MutiPlaylistModel extends Model
{
    function __construct()
    {
        $this->table = "muti_playlist";
        //$this->updateData(3, 2, false);
    }

    public function updateData($mutiId, $playlistId, $option){
        if($option == 'true'){
            if($this->getbyId($mutiId, $playlistId)){
                return DB::table($this->table)
                ->where('muti_id',$mutiId)
                ->where('playlist_id',$playlistId)
                ->update(array(
                    'active' => 1
                ));
            }else{
                return DB::table($this->table)
                ->insertGetId(array(
                    'muti_id'=> $mutiId,
                    'playlist_id'=> $playlistId,
                    'active' => 1
                ));
            }
        }else{
            return DB::table($this->table)
            ->where('muti_id',$mutiId)
            ->where('playlist_id',$playlistId)
            ->update(array(
                'active' => 0
            ));
        }
    }

    public function getbyId($mutiId, $playlistId){
        $result = DB::table($this->table)
            ->where('muti_id', $mutiId)
            ->where('playlist_id', $playlistId)
            ->first();
        return $result;
    }
}