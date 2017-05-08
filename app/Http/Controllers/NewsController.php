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

include('App\Library\domnode.php') ;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->ads = new AdsModel();
        $this->comment = new CommentModel();
    }
    public function index(){
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['newsSL'] = $this->news->getNewsSL();
        $data['news'] = $this->news->getNews();
        $data['newsRss'] = $this->news->getNewsRss();
        $data['newsXL'] = $this->news->getNewsXL();
        $data['newsGL'] = $this->news->getNewsGL();
        $data['newsTypes'] = $this->news->getNewsTypes();
        return view("news",$data);
    }
    public function contentnews($id)
    {
        $data['headerline'] = $this->news->getHeadline();
        $data['intro']  = $this->news->getIntro();
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
