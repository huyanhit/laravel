<?php


namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
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

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->muti = new MutiModel();
        $this->playlist = new PlaylistModel();
        $this->catjobs = new CatjobsModel();
        $this->typejobs = new TypejobsModel();
        $this->catads = new CatadsModel();
        $this->typeads = new TypeadsModel();
        $this->location = new LocationModel();
        $this->index();
    }
    public function index()
    {
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['newsSL'] = $this->news->getNewsSL();
        $data['news'] = $this->news->getNews();
        $data['newsRss'] = $this->news->getNewsRss();
        $data['newsXL'] = $this->news->getNewsXL();
        $data['newsGL'] = $this->news->getNewsGL();
        $data['location'] = $this->location->getLocation();
        $data['catjobs'] = $this->catjobs->getCatjobs();
        $data['typejobs'] = $this->typejobs->getTypejobs();
        $data['jobs'] = $this->jobs->getJobs();
        $data['jobsvip'] = $this->jobs->getJobsvip();
        $data['ads'] = $this->ads->getAds();
        $data['totaldisplay'] = $this->ads->getTotaldisplay($data['ads']);
        $data['catads'] = $this->catads->getCatads();
        $data['typeads'] = $this->typeads->getTypeads();
        $data['audio'] = $this->muti->getMuti();
        $data['playlist'] = $this->playlist->getPlaylist();
        return view("home",$data);
    }
    public function ajaxjobs(){
        $data['location'] = $this->location->getLocation();
        $data['catjobs'] = $this->catjobs->getCatjobs();
        $data['typejobs'] = $this->typejobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        return view("include/module-postjobs-ajaxlistjobs",$data);
    }
    public function ajaxads(){
        $data['location'] = $this->location->getLocation();
        $data['catads'] = $this->catads->getCatads();
        $data['typeads'] = $this->typeads->getTypeads();
        $data['ads'] = $this->ads->getAll();
        $data['totaldisplay'] = $this->ads->getTotaldisplay($data['ads']);
        return view("include/module-mansory-ajaxadv",$data);
    }
}
