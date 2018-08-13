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
use App\Http\Models\SystemModel;

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
        $this->systemCode   = new SystemModel();
    }
    public function muti($id_str){
        $cut_id = strrpos($id_str,'-');
        $id = substr($id_str,$cut_id + 1);
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro'] = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['headerline'] = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['recent'] = $this->muti->getRecentMuti($id);
        $data['news'] = $this->news->getPopularNews();
        $data['jobs'] = $this->jobs->getPopularJobs();
        $data['ads'] = $this->ads->getPopularAds();
        $data['comment'] = $this->comment->getCommentByID('playlistid',$id);
        $data['result'] = $this->muti->getMutiById($id);
        $data['typeid'] = 'mutiid';
        return view("contentmuti",$data);
    }
    public function playList($id_str){
        $cut_id = strrpos($id_str,'-');
        $id = substr($id_str,$cut_id + 1);

        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro'] = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['headerline'] = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['news'] = $this->news->getPopularNews();
        $data['jobs'] = $this->jobs->getPopularJobs();
        $data['ads'] = $this->ads->getPopularAds();
        $data['comment'] = $this->comment->getCommentByID('playlistid',$id);

        $data['mutiplaylist'] = $this->mutiplaylist->getMutiPlayListById($id);
        $data['recent'] = $this->playlist->getRecentPlayList($id);
        $data['result'] = $this->playlist->getPlayListByID($id);

        $data['typeid'] = 'playlistid';
        return view("contentplaylist",$data);
    }
}
