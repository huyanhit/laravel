<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;
use App\Http\Models\NewsModel;
use App\Http\Models\JobsModel;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->intro = new IntroModel();
        $this->news = new NewsModel();
        $this->jobs = new JobsModel();
        $this->myFunction = new MyFunction();
        $this->index();
    }
    
    public function index()
    {
        $data['headerline'] = $this->headerline->getAll();
        foreach ($data['headerline'] as $key => $val) {
            $data['headerline'][$key]->title = $this->myFunction->trimText($data['headerline'][$key]->title,50);
            $data['headerline'][$key]->date_create = date('d-m-Y',$data['headerline'][$key]->date_create);
           
            if(empty($data['headerline'][$key]->image) || !file_exists('public/uploads/'.$data['headerline'][$key]->image)){
                $data['headerline'][$key]->image = './public/uploads/headerline/Chrysanthemum.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['headerline'][$key]->image,1.5,1,'headerline',200);
                $data['headerline'][$key]->image = './public/uploads/headerline/'.$data['headerline'][$key]->image;
            }
        }

        $data['intro'] = $this->intro->getAll();
        foreach ($data['intro'] as $key => $val) {
            $data['intro'][$key]->title = $this->myFunction->trimText($data['intro'][$key]->title,30);
            $data['intro'][$key]->desc = $this->myFunction->trimText($data['intro'][$key]->desc,60);
        }

        $data['news'] = $this->news->getAll();
        foreach ($data['news'] as $key => $val) {
            $data['news'][$key]->title = $this->myFunction->trimText($data['news'][$key]->title,40);
            $data['news'][$key]->desc = $this->myFunction->trimText($data['news'][$key]->desc,60);
            if(empty($data['news'][$key]->image) || !file_exists('public/uploads/'.$data['news'][$key]->image)){
                $data['news'][$key]->image = './public/uploads/news/Chrysanthemum.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['news'][$key]->image,1.5,1,'news',400);
                $data['news'][$key]->image = './public/uploads/news/'.$data['news'][$key]->image;
            }
        }
        $data['newshot'] = $this->news->getNewshot();
        foreach ($data['newshot'] as $key => $val) {
            $data['newshot'][$key]->title = $this->myFunction->trimText($data['newshot'][$key]->title,40);
            $data['newshot'][$key]->desc = $this->myFunction->trimText($data['newshot'][$key]->desc,60);
        }
        $data['newsnew'] = $this->news->getNewsnew();
        foreach ($data['newsnew'] as $key => $val) {
            $data['newsnew'][$key]->title = $this->myFunction->trimText($data['newsnew'][$key]->title,60);
            $data['newsnew'][$key]->desc = strip_tags($data['newsnew'][$key]->desc);
            if(empty($data['newsnew'][$key]->image) || !file_exists('public/uploads/'.$data['newsnew'][$key]->image)){
                $data['newsnew'][$key]->image = './public/uploads/newsnew/Chrysanthemum.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['newsnew'][$key]->image,1,1,'newsnew',200);
                $data['newsnew'][$key]->image = './public/uploads/newsnew/'.$data['newsnew'][$key]->image;
            }
        }
        $data['location'] = $this->jobs->getLocation();
        $data['catjobs'] = $this->jobs->getCatjobs();
        $data['typejobs'] = $this->jobs->getTypejobs();
        $data['jobs'] = $this->jobs->getAll();
        foreach ($data['jobs'] as $key => $val) {
            $data['jobs'][$key]->title = $this->myFunction->trimText($data['jobs'][$key]->title,40);
            $data['jobs'][$key]->desc = $this->myFunction->trimText($data['jobs'][$key]->desc,60);
            $data['jobs'][$key]->date_create = date('d-m-Y',$data['jobs'][$key]->date_create);
        } 
        $data['jobsvip'] = $this->jobs->getJobsvip();
        foreach ($data['jobsvip'] as $key => $val) {
            $data['jobsvip'][$key]->title = $this->myFunction->trimText($data['jobsvip'][$key]->title,40);
            $data['jobsvip'][$key]->desc = $this->myFunction->trimText($data['jobsvip'][$key]->desc,60);
            $data['jobsvip'][$key]->date_create = date('d-m-Y',$data['jobsvip'][$key]->date_create);
            if(empty($data['jobsvip'][$key]->image) || !file_exists('public/uploads/'.$data['jobsvip'][$key]->image)){
                $data['jobsvip'][$key]->image = './public/uploads/jobsvip/Chrysanthemum.jpg';
            }else{
                $this->myFunction->cropImage('./public/uploads/'.$data['jobsvip'][$key]->image,1,1,'jobsvip',400);
                $data['jobsvip'][$key]->image = './public/uploads/jobsvip/'.$data['jobsvip'][$key]->image;
            }
        }
        return view("home",$data);
    }
}
