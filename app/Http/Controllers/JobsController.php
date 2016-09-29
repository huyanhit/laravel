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
use App\Http\Models\LocationModel;
use App\Http\Models\CatjobsModel;
use App\Http\Models\TypejobsModel;
include('App\Library\domnode.php') ;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->catjobs = new CatjobsModel();
        $this->typejobs = new TypejobsModel();
        $this->location = new LocationModel();
        $this->comment = new CommentModel();
    }
    public function index(){
        $data['headerline'] = $this->news->getHeadline();
        $data['location'] = $this->location->getLocation();
        $data['catjobs'] = $this->catjobs->getCatjobs();
        $data['typejobs'] = $this->typejobs->getTypejobs();
        $data['jobs'] = $this->jobs->getJobs();
        $data['jobsvip'] = $this->jobs->getJobsvip();
        return view("jobs",$data);
    }
    public function contentjobs($id)
    {
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['news'] = $this->news->getpopularNews();
        $data['recent'] = $this->jobs->getrecentJobs($id);
        $data['ads'] = $this->ads->getpopularAds();
        $data['comment'] = $this->comment->getCommentbyID('jobsid',$id);
        $data['result'] = $this->jobs->getjobsbyId($id);
        $data['typeid'] = 'jobsid';
        return view("contentjobs",$data);
    }
}