<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\MutiModel;
use App\Http\Models\PlaylistModel;
use App\Http\Models\MutiplaylistModel;

class MutiController extends Controller
{
    public function __construct()
    {
        $this->muti = new MutiModel();
        $this->playlist = new PlaylistModel();
        $this->mutiplaylist = new MutiplaylistModel();
    }
    public function muti($id){
        $data['muti'] = $this->muti->getMutibyID($id);
        return view("muti",$data);
    }
    public function playlist($id){
        $data['playlist'] = $this->playlist->getPlaylistbyId($id);
        $data['mutiplaylist'] = $this->mutiplaylist->getMutiplaylistbyId($id);
        return view("playlist",$data);
    }
}
