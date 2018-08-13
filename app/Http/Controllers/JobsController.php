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
use App\Http\Models\SystemModel;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->news     = new NewsModel();
        $this->jobs     = new JobsModel();
        $this->ads      = new AdsModel();
        $this->catjobs  = new CatjobsModel();
        $this->typejobs = new TypejobsModel();
        $this->location = new LocationModel();
        $this->comment  = new CommentModel();
        $this->systemCode   = new SystemModel();
    }
    public function index(){
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $this->arrJobs    = $this->systemCode->getListSystemCodelByName('jobs_position');
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['location'] = $this->location->getLocation();
        $data['catjobs'] = $this->catjobs->getCatJobs();
        $data['typejobs'] = $this->typejobs->getTypeJobs();
        $data['jobs'] = $this->jobs->getJobs();
        $data['jobsvip'] = $this->jobs->getJobsFrame($this->arrJobs['jobs_good'],40,60, 10);
        return view("jobs",$data);
    }
    public function contentjobs($id_str)
    {
        $cut_id = strrpos($id_str,'-');
        $id = substr($id_str,$cut_id + 1);

        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
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