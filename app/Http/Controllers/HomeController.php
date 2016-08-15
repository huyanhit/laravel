<?php


namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
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
        $this->myFunction = new MyFunction();
        $this->index();
    }
    
    public function index()
    {
        $data['headerline'] = $this->headerline->getAll();
        foreach ($data['headerline'] as $key => $val) {
            $data['headerline'][$key]->title = $this->myFunction->trimText($data['headerline'][$key]->title,60);
            $data['headerline'][$key]->desc = $this->myFunction->trimText($data['headerline'][$key]->desc,80);
           
            if(empty($data['headerline'][$key]->image) || !file_exists('public/uploads/'.$data['headerline'][$key]->image)){
                $data['headerline'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['headerline'][$key]->image,1.5,1,'headerline',400);
                $data['headerline'][$key]->image = './public/uploads/headerline/'.$data['headerline'][$key]->image;
            }
        }

        $data['intro'] = $this->intro->getAll();
        foreach ($data['intro'] as $key => $val) {
            $data['intro'][$key]->desc = $this->myFunction->trimText($data['intro'][$key]->desc,60);
        }

        $data['newsSL'] = $this->news->getNewsSL();
        foreach ($data['newsSL'] as $key => $val) {
            $data['newsSL'][$key]->title = $this->myFunction->trimText($data['newsSL'][$key]->title,70);
            $data['newsSL'][$key]->desc = $this->myFunction->trimText($data['newsSL'][$key]->desc,200);
            if(empty($data['newsSL'][$key]->image) || !file_exists('public/uploads/'.$data['newsSL'][$key]->image)){
                $data['newsSL'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['newsSL'][$key]->image,1.5,1,'newsSL',400);
                $data['newsSL'][$key]->image = './public/uploads/newsSL/'.$data['newsSL'][$key]->image;
            }
        }

        $data['news'] = $this->news->getAll();
        foreach ($data['news'] as $key => $val) {
            $data['news'][$key]->title = $this->myFunction->trimText($data['news'][$key]->title, 40);
        }

        $data['newsRss'] = $this->news->getNewsRss();
        foreach ($data['newsRss'] as $key => $val) {
            $data['newsRss'][$key]->title = $this->myFunction->trimText($data['newsRss'][$key]->title,60);
            $data['newsRss'][$key]->desc = strip_tags($data['newsRss'][$key]->desc);
            if(empty($data['newsRss'][$key]->image) || !file_exists('public/uploads/'.$data['newsRss'][$key]->image)){
                $data['newsRss'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['newsRss'][$key]->image,1,1,'newsRss',200);
                $data['newsRss'][$key]->image = './public/uploads/newsRss/'.$data['newsRss'][$key]->image;
            }
        }
        $data['newsXL'] = $this->news->getNewsXL();
        foreach ($data['newsXL'] as $key => $val) {
            $data['newsXL'][$key]->title = $this->myFunction->trimText($data['newsXL'][$key]->title,60);
            $data['newsXL'][$key]->desc = strip_tags($data['newsXL'][$key]->desc);
            if(empty($data['newsXL'][$key]->image) || !file_exists('public/uploads/'.$data['newsXL'][$key]->image)){
                $data['newsXL'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['newsXL'][$key]->image,1,1,'newsXL',200);
                $data['newsXL'][$key]->image = './public/uploads/newsXL/'.$data['newsXL'][$key]->image;
            }
        }
        $data['newsGL'] = $this->news->getNewsGL();
        foreach ($data['newsGL'] as $key => $val) {
            $data['newsGL'][$key]->title = $this->myFunction->trimText($data['newsGL'][$key]->title,60);
            $data['newsGL'][$key]->desc = strip_tags($data['newsGL'][$key]->desc);
            if(empty($data['newsGL'][$key]->image) || !file_exists('public/uploads/'.$data['newsGL'][$key]->image)){
                $data['newsGL'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['newsGL'][$key]->image,1,1,'newsGL',200);
                $data['newsGL'][$key]->image = './public/uploads/newsGL/'.$data['newsGL'][$key]->image;
            }
        }
        $data['location'] = $this->jobs->getLocation();
        $data['catjobs'] = $this->jobs->getCatjobs();
        $data['typejobs'] = $this->jobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        foreach ($data['jobs'] as $key => $val) {
            $data['jobs'][$key]->title = $this->myFunction->trimText($data['jobs'][$key]->title,40);
            $data['jobs'][$key]->desc = $this->myFunction->trimText($data['jobs'][$key]->desc,60);
            $data['jobs'][$key]->date_create = date('d-m-Y',$data['jobs'][$key]->date_create);
        } 
        $data['jobsvip'] = $this->jobs->getJobsvip();
        foreach ($data['jobsvip'] as $key => $val) {
            $data['jobsvip'][$key]->title = $this->myFunction->trimText($data['jobsvip'][$key]->title,40);
            $data['jobsvip'][$key]->desc = $this->myFunction->trimText($data['jobsvip'][$key]->desc,60);
            $data['jobsvip'][$key]->date_create = date('d-m-Y',$data['jobsvip'][$key]->date_create);
            if(empty($data['jobsvip'][$key]->image) || !file_exists('public/uploads/'.$data['jobsvip'][$key]->image)){
                $data['jobsvip'][$key]->image = './public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['jobsvip'][$key]->image,1,1,'jobsvip',400);
                $data['jobsvip'][$key]->image = './public/uploads/jobsvip/'.$data['jobsvip'][$key]->image;
            }
        }
        return view("home",$data);
    }
    
    public function ajaxjobs(){
        $data['location'] = $this->jobs->getLocation();
        $data['catjobs'] = $this->jobs->getCatjobs();
        $data['typejobs'] = $this->jobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        foreach ($data['jobs'] as $key => $val) {
            $data['jobs'][$key]->title = $this->myFunction->trimText($data['jobs'][$key]->title,40);
            $data['jobs'][$key]->desc = $this->myFunction->trimText($data['jobs'][$key]->desc,60);
            $data['jobs'][$key]->date_create = date('d-m-Y',$data['jobs'][$key]->date_create);
        } 
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
