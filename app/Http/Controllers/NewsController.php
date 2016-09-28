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
    
    public function content($id)
    {
        $data['headerline'] = $this->news->getHeadline();
        $data['intro'] = $this->news->getIntro();
        $data['result'] = $this->news->getnewsbyId($id);
        $data['recent'] = $this->news->getrecentNews($id);
        $data['jobs'] = $this->jobs->getpopularJobs();
        $data['ads'] = $this->ads->getpopularAds();
        $data['typeid'] = 'newsid';
        $data['comment'] = $this->comment->getCommentbyID('newsid',$id);
        if(isset($data['result']->content)){
            $data['result']->content= preg_replace('/<[\/]*p[^>]*>/', '',$data['result']->content); 
            $checkrss = substr($data['result']->content, 0 , 4);
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
        return view("contentnews",$data);
    }
}
