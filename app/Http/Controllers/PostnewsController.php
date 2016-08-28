<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\NewsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\CommentModel;

include('App\Library\domnode.php') ;

class PostnewsController extends Controller
{
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->intro = new IntroModel();
        $this->news = new NewsModel();
        $this->comment = new CommentModel();
    }
    
    public function content($id)
    {
        $data['headerline'] = $this->headerline->getAll();
        $data['intro'] = $this->intro->getAll();
        $data['result'] = $this->news->getnewsbyId($id);
        $data['recent'] = $this->news->getRecentNews($id);
        $data['comment'] = $this->comment->getCommentbyID('idnews',$id);
        if(isset($data['result']->content)){
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
        return view("contentnews",$data);
    }
    public function insertComment(){
        $data = ['id'           => NULL,
                'name'     => $_POST['name'],
                'comment'    => $_POST['comment'],
                'date_create' => time(),
                'idnews' => $_POST['id'],
                'idcomment' => isset($_POST['idcomment'])?$_POST['idcomment']:0];
        $this->comment->insertComment($data);
        $html ='
        <div class="content clearfix">
            <div class="avata"><img src="http://localhost/laravel/public/images/background-new.jpg"></div>
            <div class="pendding">Cho duyet</div>
            <div class="extra">
                <span class="name"><strong>'.$_POST['name'].'</strong></span>
                <span class="date">Luc: '.date('d-m-Y',time()).'</span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 0 </span>
                <span class="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 0 </span>
            </div>
            <div class="desc">'.$_POST['comment'].'</div>
        </div>';
        print($html);
    }
}
