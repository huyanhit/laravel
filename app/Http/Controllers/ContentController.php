<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
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
        $this->myFunction = new MyFunction();
    }
    
    public function content($id)
    {
        $data['headerline'] = $this->headerline->getAll();
        foreach ($data['headerline'] as $key => $val) {
            $data['headerline'][$key]->title = $this->myFunction->trimText($data['headerline'][$key]->title,60);
            $data['headerline'][$key]->desc = $this->myFunction->trimText($data['headerline'][$key]->desc,80);
           
            if(empty($data['headerline'][$key]->image) || !file_exists('public/uploads/'.$data['headerline'][$key]->image)){
                $data['headerline'][$key]->image = '../public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['headerline'][$key]->image,1.5,1,'headerline',400);
                $data['headerline'][$key]->image = '../public/uploads/headerline/'.$data['headerline'][$key]->image;
            }
        }

        $data['intro'] = $this->intro->getAll();
        foreach ($data['intro'] as $key => $val) {
            $data['intro'][$key]->desc = $this->myFunction->trimText($data['intro'][$key]->desc,60);
        }

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
        }

        return view("content",$data);
    }
}
