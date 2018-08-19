<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\JobsModel;
use App\Http\Models\CatjobsModel;
use App\Http\Models\TypejobsModel;
use App\Http\Models\LocationModel;
use App\Http\Models\NewsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;


class PostjobsController extends Controller
{
	public function __construct(Request $request)
    {
		$this->middleware('auth');
        $this->images       = 'jobs';
        $this->thum_images  = 'thum_jobs';
        $this->jobs = new JobsModel();
        $this->news = new NewsModel();
        $this->ads = new AdsModel();
        $this->request = $request;
        $this->catjobs = new CatjobsModel();
        $this->typejobs = new TypejobsModel();
        $this->location = new LocationModel();
        $this->myFunction = new MyFunction();
    }
	public function index()
	{
		$data = array();
		if(isset($_GET['order']) && isset($_GET['by'])){
			session(['order' => $_GET['order']]);
			session(['by'    => $_GET['by']]);
			$data['sort']['order'] = $_GET['order'];
			$data['sort']['by']    = $_GET['by'];
		}
		if(isset($_POST['submit'])){
			session(['title'  => $_POST['title']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
		    $data['filter']['title']  = session('title');
		    $data['filter']['active'] = session('active');
		}

		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['jobs'] = $this->jobs->getAll($data);
		return view('listjobs',$result);
	}

	public function insertJobs()
	{
        $catjobs = $this->catjobs->getCatJobs();
        $data['catjobs'] = array();
        foreach ($catjobs as $value){
            $data['catjobs'][$value->id] = $value->title;
        }

        $typejobs =$this->typejobs->getTypeJobs();
        $data['typejobs'] = array();
        foreach ($typejobs as $value){
            $data['typejobs'][$value->id] = $value->title;
        }

        $location = $this->location->getLocation();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

		$data['frm'] = "";
        if(!empty($this->request->input('submit'))){
            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catjobs' => 'required',
                'typejobs'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required',
                'captcha' => 'required|captcha'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);

			$frm = array(
			    'id'     	  => NULL,
			    'catjobs'     => $_POST['catjobs'],
			    'typejobs'    => $_POST['typejobs'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'salary'      => $_POST['salary'],
			    'date_create' => time(), 
			    'author'      => auth()->user()->id);

			if($id = $this->jobs->insertJobs($frm)){
				return redirect('/viec-lam');
			}
			$data['frm'] = $frm;
		}

        return view("postjobs", $data);
	}
	
	public function editJobs($id){

		$jobs = $this->jobs->getJobsById($id);
		$data['edit'] = $id;

        $catjobs = $this->catjobs->getCatJobs();
        $data['catjobs'] = array();
        foreach ($catjobs as $value){
            $data['catjobs'][$value->id] = $value->title;
        }

        $typejobs =$this->typejobs->getTypeJobs();
        $data['typejobs'] = array();
        foreach ($typejobs as $value){
            $data['typejobs'][$value->id] = $value->title;
        }

        $location = $this->location->getLocation();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

		$data['frm'] =array(
		    'catjobs'     => $jobs->catjobs,
		    'typejobs'    => $jobs->typejobs,
		    'location'    => $jobs->location,
		    'title'       => $jobs->title, 
		    'desc'        => $jobs->desc, 
		    'content'     => $jobs->content,
            'image'       => $jobs->image,
		    'from'        => $jobs->from, 
		    'salary'      => $jobs->salary,
		    'author'      => auth()->user()->id
        );

        if(!empty($this->request->input('submit'))){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catjobs' => 'required',
                'typejobs'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required',
                'captcha' => 'required|captcha'
            ));

            if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
			}else{
				$_FILES["feature"]["name"] = $jobs->image;
			}

			$frm =  array(
			    'catjobs'     => $_POST['catjobs'],
			    'typejobs'    => $_POST['typejobs'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'salary'      => $_POST['salary'],
                'active'      => 0,
			    'date_update' => time(),  
			    'author'      => auth()->user()->id
            );

            if($this->jobs->updateJobs($frm,$id)){
                return view('postjobs',$data);
            }else{
                $data['frm'] = $frm;
            }
		}

		return view('postjobs',$data);
	}

	public function deleteJobs($id)
	{
		if($id){
			return $this->jobs->deteleId($id);
		}
	}

	public function postFaceJobs($id){
        $result = $this->jobs->getJobsById($id);
        $token = 'EAACZCuDOGPW4BAACeeyGTJajVZB5ciDIygwo3AAH1hJZC3P5jwOjJtN2mEhVpLzo79yVSbgNRwPvXnQBMRlnncy5RHW0x1UFcNj2GO6ZCO6krjgntk9ZCJf9oSuryH3m1ZC5FrHVfU5BMuxxlFZC5lM6YK6ji7uVcgQ5q8lxpAg5gZDZD';
        $data['params'] = array(
          "access_token" => $token,
          "message" => $result->from,
          "link" => url('/').'/noi-dung-viec-lam/'.$result->id,
          "picture" => url('/').'/public/uploads/'.$result->image,
          "name" => $result->title,
          "caption" => strip_tags($result->desc),
          "description" => strip_tags($result->content)
        );
        return view("include/module-listjobs-postface",$data);
    }
}