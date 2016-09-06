<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\MutiModel;
use App\Http\Models\PlaylistModel;

class MutiController extends Controller
{
    public function __construct()
    {
        $this->muti = new MutiModel();
        $this->playlist = new PlaylistModel();
    }
    public function audio($id){
        $data['audio'] = $this->muti->getMutibyID($id);
        return view("audio",$data);
    }
    public function playlist($id){
        $data['playlist'] = $this->playlist->getPlaylistbyId($id);
        $data['mutiplaylist'] = $this->playlist->getMutiplaylistbyId($id);
        //print_r($data['mutiplaylist']);
        //die;
        return view("playlist",$data);
    }
    public function video($id){
        $data['muti'] = $this->muti->getTypemutibyId($id);
        return view("mutimedia",$data);
    }
}
