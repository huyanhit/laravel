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
use App\Http\Models\SystemModel;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->news     = new NewsModel();
        $this->jobs     = new JobsModel();
        $this->ads      = new AdsModel();
        $this->catads   = new CatadsModel();
        $this->typeads  = new TypeadsModel();
        $this->location = new LocationModel();
        $this->comment  = new CommentModel();
        $this->systemCode   = new SystemModel();
    }
    public function index(){
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['ads']          = $this->ads->getAds();
        $data['totaldisplay'] = $this->ads->getTotalDisplay($data['ads']);
        $data['catads']       = $this->catads->getCatAds();
        $data['typeads']      = $this->typeads->getTypeAds();
        $data['location']     = $this->location->getLocation();
        return view("ads",$data);
    }
    public function contentAds($id_str)
    {
        $cut_id = strrpos($id_str,'-');
        $id = substr($id_str,$cut_id + 1);

        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $this->arrAds    = $this->systemCode->getListSystemCodelByName('jobs_position');
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['news']         = $this->news->getPopularNews();
        $data['recent']       = $this->ads->getRecentAds($id);
        $data['ads']          = $this->jobs->getPopularJobs();
        $data['comment']      = $this->comment->getCommentByID('adsid',$id);
        $data['result']       = $this->ads->getAdsById($id);
        $data['typeid']       = 'adsid';
        $this->ads->updateView($id);
        return view("contentads",$data);
    }

}