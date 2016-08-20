<?php


namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->intro = new IntroModel();
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
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
        $data['location'] = $this->jobs->getLocation();
        return view("include/module-mansory-ajaxadv",$data);
    }
}
