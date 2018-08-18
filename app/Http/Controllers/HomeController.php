<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\MutiModel;
use App\Http\Models\CatjobsModel;
use App\Http\Models\TypejobsModel;
use App\Http\Models\CatadsModel;
use App\Http\Models\TypeadsModel;
use App\Http\Models\LocationModel;
use App\Http\Models\PlaylistModel;
use App\Http\Models\CommentModel;
use App\Http\Models\SystemModel;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->news         = new NewsModel();
        $this->jobs         = new JobsModel();
        $this->ads          = new AdsModel();
        $this->muti         = new MutiModel();
        $this->playlist     = new PlaylistModel();
        $this->catjobs      = new CatjobsModel();
        $this->typejobs     = new TypejobsModel();
        $this->catads       = new CatadsModel();
        $this->typeads      = new TypeadsModel();
        $this->location     = new LocationModel();
        $this->comment      = new CommentModel();
        $this->systemCode   = new SystemModel();

        $this->index();
    }

    public function index()
    {
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],60,60, 10);
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],50,110, 10);
        $data['news']           = $this->news->getNewsFrame($this->arrPositions['news_total'],70,60, 20);
        $data['newsSL']         = $this->news->getNewsFrame($this->arrPositions['news_slider'],80,100, 4 ,false,3,2,600);
        $data['newsRss']        = $this->news->getNewsFrame($this->arrPositions['news_rss'],70,100, 10,true);
        $data['newsXL']         = $this->news->getNewsFrame($this->arrPositions['news_site'],70,100, 10);
        $data['newsGL']         = $this->news->getNewsFrame($this->arrPositions['news_location'],70,100, 10);

        $this->arrPositionsJobs = $this->systemCode->getListSystemCodelByName('jobs_position');
        $data['location']       = $this->location->getLocation();
        $data['catjobs']        = $this->catjobs->getCatJobs();
        $data['typejobs']       = $this->typejobs->getTypeJobs();
        $data['jobs']           = $this->jobs->getJobs();
        $data['jobsvip']        = $this->jobs->getJobsFrame($this->arrPositionsJobs['jobs_good'],70,100, 10);

        $this->arrPositionsJobs = $this->systemCode->getListSystemCodelByName('ads_position');
        $data['ads']            = $this->ads->getAds();
        $data['totaldisplay']   = $this->ads->getTotalDisplay($data['ads']);
        $data['catads']         = $this->catads->getCatAds();
        $data['typeads']        = $this->typeads->getTypeAds();

        $data['audio']          = $this->muti->getMuti();
        $data['playlist']       = $this->playlist->getPlayList();

        return view("home",$data);
    }

    public function ajaxjobs(){
        $data['location']   = $this->location->getLocation();
        $data['catjobs']    = $this->catjobs->getCatJobs();
        $data['typejobs']   = $this->typejobs->getTypeJobs();
        $data['jobs']       = $this->jobs->getJobs();

        return view("include/module-postjobs-ajaxlistjobs",$data);
    }

    public function ajaxads(){
        $data['location']       = $this->location->getLocation();
        $data['catads']         = $this->catads->getCatAds();
        $data['typeads']        = $this->typeads->getTypeAds();
        $data['ads']            = $this->ads->getAds();
        $data['totaldisplay']   = $this->ads->getTotalDisplay($data['ads']);

        return view("include/module-mansory-ajaxadv",$data);
    }
}