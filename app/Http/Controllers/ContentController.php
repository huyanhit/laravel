<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\NewsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;

include('App\Library\domnode.php') ;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->intro = new IntroModel();
        $this->news = new NewsModel();
    }
    
    public function contentNews($id)
    {
        $data['headerline'] = $this->headerline->getAll();
        $data['intro'] = $this->intro->getAll();
        $result = $this->news->getnewsbyId($id);
        if(isset($result->content)){
            $checkrss = substr($result->content, 0 , 4);
            if($checkrss == "http"){

                $html = file_get_html($result->content);
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
                    $data['result'] = $e->innertext .'<br>';
                }
            }
            else{
                $data['result'] = trim($result->content);
            }
            $data['result'] = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data['result']);
        }
        return view("content",$data);
    }
    public function contentJobs($id){
        $data['result'] = trim("please waiting update");
        return view("content",$data);
    }
    public function contentAds($id){
        $data['result'] =  trim("please waiting update");
        return view("content",$data);
    }
}
