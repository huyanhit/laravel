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
        return view("include/ajax-listjobs",$data);
    }

    public function postface(){
        $token = 'EAACZCuDOGPW4BAGroxZCw1iCuurgjCxP7uPIHNZBKEnZBXBqfR8UnfqQpZBnEwCvwxUdY2h9o6oVJY6bFDnyzzOZCskvq5R80EthlRrxiNTMJNotXEfHEvXGUDqYQM8YVYSunboOE9uFfmIgZA60mLEwhiwHGXcgACelUJE5FxjO1C1TFm4VhwYRYfJdZCtfpOEZD';
        $data['params'] = array(
          "access_token" => $token,
          "message" => "final facebook test",
          "link" => "http://vnexpress.net/tin-tuc/thoi-su/giao-thong/xe-container-lao-sap-nha-dan-cuon-nguoi-phu-nu-tu-vong-3452733.html",
          "picture" => "http://img.f29.vnecdn.net/2016/08/15/container-1-1620-1471228140.jpg",
          "name" => "Post Facebook laravel",
          "caption" => "http://vnexpress.net",
          "description" => "Automatically post fabook app"
        );
        return view("include/post",$data);
    }
}
