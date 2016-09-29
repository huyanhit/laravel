<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\CommentModel;

include('App\Library\domnode.php') ;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->comment = new CommentModel();
    }
    
    public function contentads($id)
    {
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['news'] = $this->news->getpopularNews();
        $data['recent'] = $this->ads->getrecentAds($id);
        $data['ads'] = $this->jobs->getpopularJobs();
        $data['comment'] = $this->comment->getCommentbyID('adsid',$id);
        $data['result'] = $this->ads->getadsbyId($id);
        $data['typeid'] = 'adsid';
        return view("contentads",$data);
    }

}