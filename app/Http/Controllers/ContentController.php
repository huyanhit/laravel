<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\NewsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;

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
            $data['headerline'][$key]->title = $this->myFunction->trimText($data['headerline'][$key]->title,50);
            $data['headerline'][$key]->date_create = date('d-m-Y',$data['headerline'][$key]->date_create);
           
            if(empty($data['headerline'][$key]->image) || !file_exists('public/uploads/'.$data['headerline'][$key]->image)){
                $data['headerline'][$key]->image = '../public/images/no-image.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['headerline'][$key]->image,1.5,1,'headerline',200);
                $data['headerline'][$key]->image = '../public/uploads/headerline/'.$data['headerline'][$key]->image;
            }
        }

        $data['intro'] = $this->intro->getAll();
        foreach ($data['intro'] as $key => $val) {
            $data['intro'][$key]->desc = $this->myFunction->trimText($data['intro'][$key]->desc,60);
        }

        $result = $this->news->getnewsbyId($id);
        // $checkrss = substr($result->content, 0 , 4);
        // if($checkrss == "http"){
        //     $data['result'] = file_get_contents($result->content);
        //     //$data['result'] = $this->cutContent($data['result']);
        // }
        // else{
            $data['result'] = trim($result->content);
        // }
        return view("content",$data);
    }

    // public function cutContent($content){
    //     $pos = strpos($content,'main_content_detail');
    //     $str = substr($content, $pos , -1);
    //     $curstr = $content;
    //     $cur = $pos;
    //     $loop = true;
    //     $wrong = 0;
    //     while ($loop){
    //         if($pos = $this->findDiv($str,'div')){
    //             if(substr($str, $pos-1 , 4) == '<div'){
    //                 $pos = $this->findDiv($str,'<div');
    //                 $str = substr($str, $pos+4 , -1);
    //                 $wrong ++;
    //                 if($wrong == 5){
    //                    return $str; 
    //                 }
    //             }else if(substr($str, $pos-2 , 5) == '</div'){
    //                 $pos = $this->findDiv($str,'</div');
    //                 $str = substr($str, $pos+6 , -1);
    //                 $wrong --;
    //                 if($wrong == 4){
    //                    return $str; 
    //                 }
    //             }
    //         }
    //         if($wrong < 0){
    //             $loop = false; 
    //         }
    //     }
    //     return substr($curstr, $cur ,$pos);
    // }
    // function findDiv($str,$find){
    //     $pos = strpos($str,$find);
    //     return $pos;
    // }
}
