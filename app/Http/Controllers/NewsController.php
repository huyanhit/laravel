<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\CatnewsModel;
use App\Http\Models\IntroModel;
use App\Http\Models\CommentModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\SystemModel;
use App\Library\MyFunction;
include('./app/Library/domnode.php');

class NewsController extends Controller
{
    public function __construct()
    {
        $this->news         = new NewsModel();
        $this->jobs         = new JobsModel();
        $this->ads          = new AdsModel();;
        $this->catnews      = new CatnewsModel();
        $this->comment      = new CommentModel();
        $this->systemCode   = new SystemModel();
        $this->myFunction   = new MyFunction();

        $this->index();
    }

    public function index(){

        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['newsSL']         = $this->news->getNewsFrame($this->arrPositions['news_slider'],80,100, 4 ,false,3,2,600);
        $data['newsRss']        = $this->news->getNewsFrame($this->arrPositions['news_rss'],70,100, 10,true);
        $data['newsXL']         = $this->news->getNewsFrame($this->arrPositions['news_site'],70,100, 10);
        $data['newsGL']         = $this->news->getNewsFrame($this->arrPositions['news_location'],70,100, 10);
        $data['total']          = $this->getTotalByCategory(5);

        return view("news", $data);
    }

    private function getTotalByCategory($limit)
    {
        $images = 'news';
        $thum_images = 'thum_news';
        $data =  $this->catnews->getAll();
        foreach ($data as $key => $val){
            $news  =  $this->news->getByCategory($val->id , $limit);
            foreach ($news as $result){
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
            $data[$key]->news = $news;
        }

        return $data;
    }

    public function contentnews($id_str)
    {
        $cut_id = strrpos($id_str,'-');
        $id = substr($id_str,$cut_id + 1);
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro'] = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['headerline'] = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['result'] = $this->news->getNewsById($id);
        $data['recent'] = $this->news->getRecentNews($id);
        $data['jobs']   = $this->jobs->getPopularJobs();
        $data['ads']    = $this->ads->getPopularAds();

        $data['typeid'] = 'newsid';
        $data['comment'] = $this->comment->getCommentByID('newsid',$id);
        $data['user'] = Auth::user();

        if(isset($data['result']->content)){
            $data['result']->content= preg_replace('/<[\/]*p[^>]*>/', '',$data['result']->content); 
            $checkrss = substr(trim($data['result']->content), 0 , 5);
            if($checkrss == "https"){
                $html = file_get_html($data['result']->content);
                foreach($html->find('.block_timer_share') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('.title_div_fbook') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('#right_calculator') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('.block_input_comment') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('.block_tag') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('#box_tinkhac_detail') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('#social_like') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('#box_tinlienquan') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('script') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('#banner_common') as $e){
                    $e->innertext = '';
                }
                foreach($html->find('.main_content_detail') as $e) {
                    $data['result']->content = $e->innertext .'<br>';
                }
                $data['result']->content  = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data['result']->content);
            }
        }
        $this->news->updateView($id);

        return view("contentnews",$data);
    }
}
