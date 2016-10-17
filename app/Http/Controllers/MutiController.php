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
        $data['headerline'] = $this->news->getHeadLine();
        $data['intro'] = $this->news->getIntro();
        $data['recent'] = $this->muti->getRecentMuti($id);
        $data['news'] = $this->news->getPopularNews();
        $data['jobs'] = $this->jobs->getPopularJobs();
        $data['ads'] = $this->ads->getPopularAds();
        $data['comment'] = $this->comment->getCommentByID('playlistid',$id);
        $data['result'] = $this->muti->getMutiByID($id);
        $data['typeid'] = 'mutiid';
        return view("contentmuti",$data);
    }
    public function playList($id){
        $data['headerline'] = $this->news->getHeadLine();
        $data['intro'] = $this->news->getIntro();
        $data['news'] = $this->news->getPopularNews();
        $data['jobs'] = $this->jobs->getPopularJobs();
        $data['ads'] = $this->ads->getPopularAds();
        $data['result'] = $this->playlist->getPlayListById($id);
        $data['mutiplaylist'] = $this->mutiplaylist->getMutiPlayListById($id);
        $data['comment'] = $this->comment->getCommentByID('playlistid',$id);
        $data['recent'] = $this->playlist->getRecentPlayList($id);
        $data['typeid'] = 'playlistid';
        return view("contentplaylist",$data);
    }
}
