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
use App\Http\Models\CatadsModel;
use App\Http\Models\TypeadsModel;
include('App\Library\domnode.php') ;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->catads = new CatadsModel();
        $this->typeads = new TypeadsModel();
        $this->location = new LocationModel();
        $this->comment = new CommentModel();
    }
    public function index(){
        $data['headerline'] = $this->news->getHeadline();
        $data['ads'] = $this->ads->getAds();
        $data['totaldisplay'] = $this->ads->getTotaldisplay($data['ads']);
        $data['catads'] = $this->catads->getCatads();
        $data['typeads'] = $this->typeads->getTypeads();
        $data['location'] = $this->location->getLocation();
        return view("ads",$data);
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