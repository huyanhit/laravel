<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\MutiModel;
use App\Http\Models\PlaylistModel;
use App\Http\Models\MutiplaylistModel;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\CommentModel;

class MutiController extends Controller
{
    public function __construct()
    {
        $this->muti = new MutiModel();
        $this->playlist = new PlaylistModel();
        $this->mutiplaylist = new MutiplaylistModel();
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->comment = new CommentModel();
    }
    public function muti($id){
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['recent'] = $this->muti->getrecentMuti($id);
        $data['news'] = $this->news->getpopularNews();
        $data['jobs'] = $this->jobs->getpopularJobs();
        $data['ads'] = $this->ads->getpopularAds();
        $data['comment'] = $this->comment->getCommentbyID('playlistid',$id);
        $data['result'] = $this->muti->getMutibyID($id);
        $data['typeid'] = 'mutiid';
        return view("contentmuti",$data);
    }
    public function playlist($id){
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['news'] = $this->news->getpopularNews();
        $data['jobs'] = $this->jobs->getpopularJobs();
        $data['ads'] = $this->ads->getpopularAds();
        $data['result'] = $this->playlist->getPlaylistbyId($id);
        $data['mutiplaylist'] = $this->mutiplaylist->getmutiplaylistbyId($id);
        $data['comment'] = $this->comment->getCommentbyID('playlistid',$id);
        $data['recent'] = $this->playlist->getrecentPlaylist($id);
        $data['typeid'] = 'playlistid';
        return view("contentplaylist",$data);
    }
}
