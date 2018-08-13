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
use Illuminate\Support\Facades\Auth;
use App\Http\Models\SystemModel;

include('App\Library\domnode.php') ;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->news         = new NewsModel();
        $this->jobs         = new JobsModel();
        $this->ads          = new AdsModel();
        $this->comment      = new CommentModel();
        $this->systemCode   = new SystemModel();

        $this->index();
    }

    public function index(){

        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $data['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],40,60, 10);
        $data['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],40,60, 10);
        $data['news']           = $this->news->getNewsFrame($this->arrPositions['news_total'],40,60, 20);
        $data['newsSL']         = $this->news->getNewsFrame($this->arrPositions['news_slider'],40,60, 4 ,false,3,2,600);
        $data['newsRss']        = $this->news->getNewsFrame($this->arrPositions['news_rss'],40,60, 10);
        $data['newsXL']         = $this->news->getNewsFrame($this->arrPositions['news_site'],40,60, 10);
        $data['newsGL']         = $this->news->getNewsFrame($this->arrPositions['news_location'],40,60, 10);

        return view("news",$data);
    }

    public function contentnews($id)
    {
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
            $checkrss = substr(trim($data['result']->content), 0 , 4);
            if($checkrss == "http"){
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
