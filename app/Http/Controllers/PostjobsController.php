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
        $this->index();
    }
	public function index(){
		$data['catjobs'] = $this->postjobs->getCatjobs();
		return view("postjobs",$data);
	}

	public function insertJobs()
	{
		//print_r($_POST);
		//die();
		$data['catjobs'] = $this->postjobs->getCatjobs();
		$data['typejobs'] = $this->postjobs->getTypejobs();
		$data['location'] = $this->postjobs->getLocation();


		$data['frm'] = "";
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$this->myFunction->uploadImage($_FILES["feature"]);
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
			    'active'      => isset($_POST['active'])? 1 : 0,  
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->postjobs->insertJobs($frm)){
				return redirect('postjobs/edit?id='.$id);
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
			    'active'      => $jobs->active,  
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
		    'active'      => $jobs->active,  
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$this->myFunction->uploadImage($_FILES["feature"]);
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
			    'active'      => isset($_POST['active'])? 1 : 0, 
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
}