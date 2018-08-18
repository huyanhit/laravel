<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
use App\Library\MyFunction;

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
        $this->myFunction   = new MyFunction();
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
        $data['total']          = $this->getTotalByCategory(5);
        return view("ads",$data);
    }

    private function getTotalByCategory($limit)
    {
        $images = 'ads';
        $thum_images = 'thum_ads';
        $data =  $this->catads->getAll();
        foreach ($data as $key => $val){
            $ads  =  $this->ads->getByCategory($val->id , $limit);
            foreach ($ads as $result){
                $result->id = $this->myFunction->toSlug($result->title).'-'.$result->id;
                $result->title = $this->myFunction->trimText($result->title,-1);
                $result->desc = $this->myFunction->trimText($result->desc,-1);
                $result->date_create = date('d-m-Y',$result->date_create);
                if(empty($result->image) || !file_exists('public/uploads/'.$images.'/'.$result->image)){
                    $result->image = $this->myFunction->cropImage(url('/').'/public/images/no-image.jpg', 1, 1, $thum_images);
                }else{
                    $result->image = $this->myFunction->cropImage(url('/').'/public/uploads/'.$images.'/'.$result->image, 1, 1, $thum_images);
                }
            }
            $data[$key]->ads = $ads;
        }

        return $data;
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