<?php


namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\MutiModel;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->intro = new IntroModel();
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->muti = new MutiModel();
        $this->index();
    }
    
    public function index()
    {
        $data['headerline'] = $this->headerline->getAll();
        $data['intro'] = $this->intro->getAll();
        $data['newsSL'] = $this->news->getNewsSL();
        $data['news'] = $this->news->getAll();
        $data['newsRss'] = $this->news->getNewsRss();
        $data['newsXL'] = $this->news->getNewsXL();
        $data['newsGL'] = $this->news->getNewsGL();
        $data['location'] = $this->jobs->getLocation();
        $data['catjobs'] = $this->jobs->getCatjobs();
        $data['typejobs'] = $this->jobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        $data['jobsvip'] = $this->jobs->getJobsvip();
        $data['ads'] = $this->ads->getAll();
        $data['totaldisplay'] = $this->ads->getTotaldisplay($data['ads']);
        $data['catads'] = $this->ads->getCatads();
        $data['typeads'] = $this->ads->getTypeads();
        $data['muti'] = $this->muti->getAll();
        return view("home",$data);
    }
    public function ajaxjobs(){
        $data['location'] = $this->jobs->getLocation();
        $data['catjobs'] = $this->jobs->getCatjobs();
        $data['typejobs'] = $this->jobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        return view("include/module-postjobs-ajaxlistjobs",$data);
    }
    public function ajaxads(){
        $data['location'] = $this->ads->getLocation();
        $data['catads'] = $this->ads->getCatads();
        $data['typeads'] = $this->ads->getTypeads();
        $data['ads'] = $this->ads->getAll();
        $data['totaldisplay'] = $this->ads->getTotaldisplay($data['ads']);
        return view("include/module-mansory-ajaxadv",$data);
    }
}
