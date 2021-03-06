<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\JobsModel;
use App\Http\Models\CatadsModel;
use App\Http\Models\TypeadsModel;
use App\Http\Models\LocationModel;
use App\Http\Models\NewsModel;
use App\Http\Models\AdsModel;
use App\Http\Models\HeaderlineModel;
use App\Http\Models\IntroModel;

class PostadsController extends BaseController
{
	public function __construct()
    {
    	$this->middleware('auth');
        $this->ads = new AdsModel();
        $this->catads = new CatadsModel();
        $this->typeads = new TypeadsModel();
        $this->location = new LocationModel();
        $this->myFunction = new MyFunction();
        $this->jobs = new JobsModel();
        $this->news = new NewsModel();
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
		$result['ads'] = $this->ads->getAll($data);
		return view('listads',$result);
	}

	public function insertAds()
	{
		$data['catads'] = $this->catads->getCatAds();
		$data['typeads'] = $this->typeads->getTypeAds();
		$data['location'] = $this->location->getLocation();
		$data['frm'] = "";
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			$frm =  
			    ['id'     	  => NULL,
			    'catads'     => $_POST['catads'],
			    'typeads'    => $_POST['typeads'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->ads->insertAds($frm)){
				return redirect('/rao-vat');
			}
			$data['frm'] = $frm;
			return view("postads",$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$ads = $this->ads->getAdsById($id);
				$data['catads'] = $this->catads->getCatAds();
				$data['typeads'] = $this->typeads->getTypeAds();
				$data['location'] = $this->location->getLocation();
				$data['frm'] =  
			    ['catads'    => $ads->catads,
			    'typeads'    => $ads->typeads,
			    'location'    => $ads->location,
			    'title'       => $ads->title, 
			    'desc'        => $ads->desc, 
			    'content'     => $ads->content, 
			    'image'       => $ads->image,
			    'from'        => $ads->from,  
			    'author'      => 1];
				return view('postads',$data);
			}
			return view('postads',$data);
		}
	}
	
	public function editAds(){
		$id = $_GET['id'];
		$ads = $this->ads->getAdsById($id);
		$data['edit'] = $id;
		$data['catads'] = $this->catads->getCatAds();
		$data['typeads'] = $this->typeads->getTypeAds();
		$data['location'] = $this->location->getLocation();
		$data['frm'] =  
		   ['catads'      => $ads->catads,
		    'typeads'     => $ads->typeads,
		    'location'    => $ads->location,
		    'title'       => $ads->title, 
		    'desc'        => $ads->desc, 
		    'content'     => $ads->content, 
		    'from'        => $ads->from, 
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			}else{
				$_FILES["feature"]["name"] = $ads->image;
			}
			$frm =  
			   ['catads'     => $_POST['catads'],
			    'typeads'    => $_POST['typeads'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'date_update' => time(),  
			    'author'      => 1];
			if($this->ads->updateAds($frm,$id)){
				return redirect('/rao-vat');
			}else{
				$data['frm'] = $frm;
				return view('postads',$data);
			}
		}else{
			return view('postads',$data);
		}
	}

	public function deleteAds()
	{
		if(isset($_GET['id'])){
			return $this->ads->deteleId($_GET['id']);
		}
	}

	public function postFaceads($id){
        $result = $this->ads->getAdsById($id);
        $token = 'EAACZCuDOGPW4BAACeeyGTJajVZB5ciDIygwo3AAH1hJZC3P5jwOjJtN2mEhVpLzo79yVSbgNRwPvXnQBMRlnncy5RHW0x1UFcNj2GO6ZCO6krjgntk9ZCJf9oSuryH3m1ZC5FrHVfU5BMuxxlFZC5lM6YK6ji7uVcgQ5q8lxpAg5gZDZD';
        $data['params'] = array(
          "access_token" => $token,
          "message" => $result->from,
          "link" => url('/').'/noi-dung-rao-vat/'.$result->id,
          "picture" => url('/').'/public/uploads/'.$result->image,
          "name" => $result->title,
          "caption" => strip_tags($result->desc),
          "description" => strip_tags($result->content)
        );
        return view("include/module-listads-postface",$data);
    }
}