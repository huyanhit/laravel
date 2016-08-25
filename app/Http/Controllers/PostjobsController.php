<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\PostjobsModel;


class PostjobsController extends BaseController
{
	public function __construct()
    {
        $this->postjobs = new PostjobsModel();
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
		$result['jobs'] = $this->postjobs->getAll($data);
		return view('listjobs',$result);
	}

	public function insertJobs()
	{
		$data['catjobs'] = $this->postjobs->getCatjobs();
		$data['typejobs'] = $this->postjobs->getTypejobs();
		$data['location'] = $this->postjobs->getLocation();


		$data['frm'] = "";
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			$frm =  
			    ['id'     	  => NULL,
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
			    'author'      => 1];
			if($id = $this->postjobs->insertJobs($frm)){
				return redirect('/viec-lam');
			}
			$data['frm'] = $frm;
			return view("postjobs",$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$jobs = $this->postjobs->getjobsbyId($id);
				$data['catjobs'] = $this->postjobs->getCatjobs();
				$data['typejobs'] = $this->postjobs->getTypejobs();
				$data['location'] = $this->postjobs->getLocation();
				$data['frm'] =  
			    ['catjobs'    => $jobs->catjobs,
			    'typejobs'    => $jobs->typejobs,
			    'location'    => $jobs->location,
			    'title'       => $jobs->title, 
			    'desc'        => $jobs->desc, 
			    'content'     => $jobs->content, 
			    'image'       => $jobs->image,
			    'from'        => $jobs->from, 
			    'salary'      => $jobs->salary, 
			    'author'      => 1];
				return view('postjobs',$data);
			}
			return view('postjobs',$data);
		}
	}
	
	public function editJobs(){
		$id = $_GET['id'];
		$jobs = $this->postjobs->getjobsbyId($id);
		$data['edit'] = $id;
		$data['catjobs'] = $this->postjobs->getCatjobs();
		$data['typejobs'] = $this->postjobs->getTypejobs();
		$data['location'] = $this->postjobs->getLocation();
		$data['frm'] =  
		   ['catjobs'     => $jobs->catjobs,
		    'typejobs'    => $jobs->typejobs,
		    'location'    => $jobs->location,
		    'title'       => $jobs->title, 
		    'desc'        => $jobs->desc, 
		    'content'     => $jobs->content, 
		    'from'        => $jobs->from, 
		    'salary'      => $jobs->salary,
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			}else{
				$_FILES["feature"]["name"] = $jobs->image;
			}
			$frm =  
			   ['catjobs'     => $_POST['catjobs'],
			    'typejobs'    => $_POST['typejobs'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'salary'      => $_POST['salary'],
			    'date_update' => time(),  
			    'author'      => 1];
			$this->postjobs->updateJobs($frm,$id);
			$data['frm'] = $frm;
			return view('postjobs',$data);
		}else{
			return view('postjobs',$data);
		}
	}

	public function deleteJobs()
	{
		if(isset($_GET['id'])){
			return $this->postjobs->deteleId($_GET['id']);
		}
	}

	public function postfaceJobs($id){
        $result = $this->postjobs->getjobsbyId($id);
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