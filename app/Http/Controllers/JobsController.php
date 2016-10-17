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
        $data['headerline'] = $this->news->getHeadLine();
        $data['location'] = $this->location->getLocation();
        $data['catjobs'] = $this->catjobs->getCatJobs();
        $data['typejobs'] = $this->typejobs->getTypeJobs();
        $data['jobs'] = $this->jobs->getJobs();
        $data['jobsvip'] = $this->jobs->getJobsVip();
        return view("jobs",$data);
    }
    public function contentjobs($id)
    {
        $data['headerline'] = $this->news->getHeadLine();
        $data['intro'] = $this->news->getIntro();
        $data['news'] = $this->news->getPopularNews();
        $data['recent'] = $this->jobs->getRecentJobs($id);
        $data['ads'] = $this->ads->getPopularAds();
        $data['comment'] = $this->comment->getCommentByID('jobsid',$id);
        $data['result'] = $this->jobs->getJobsById($id);
        $data['typeid'] = 'jobsid';
        $this->jobs->updateView($id);
        return view("contentjobs",$data);
    }
}