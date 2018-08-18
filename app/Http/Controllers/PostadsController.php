<?php

namespace App\Http\Controllers;

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
use App\Http\Models\SystemModel;

class PostadsController extends Controller
{
	public function __construct(Request $request)
    {
    	$this->middleware('auth');
        $this->images       = 'ads';
        $this->thum_images  = 'thum_ads';
        $this->request = $request;
        $this->ads = new AdsModel();
        $this->catads = new CatadsModel();
        $this->typeads = new TypeadsModel();
        $this->location = new LocationModel();
        $this->myFunction = new MyFunction();
        $this->jobs = new JobsModel();
        $this->news = new NewsModel();
        $this->systemCode   = new SystemModel();
    }

	public function index()
	{
		$data = array();
        $this->arrPositions     = $this->systemCode->getListSystemCodelByName('news_position');
        $result['intro']          = $this->news->getNewsFrame($this->arrPositions['news_scroll'],60,60, 10);
        $result['headerline']     = $this->news->getNewsFrame($this->arrPositions['news_top'],50,110, 10);

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
        $catads = $this->catads->getCatAds();
        foreach ($catads as $value){
            $data['catads'][$value->id] = $value->title;
        }

        $typeads = $this->typeads->getTypeAds();
        $data['typeads'] = array();
        foreach ($typeads as $value){
            $data['typeads'][$value->id] = $value->title;
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
                'catads' => 'required',
                'typeads'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required',
                'captcha' => 'required|captcha'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);

            $frm = array(
                'id'     	  => NULL,
                'catads'      => $_POST['catads'],
                'typeads'     => $_POST['typeads'],
                'location'    => $_POST['location'],
                'title'       => $_POST['title'],
                'desc'        => $_POST['desc'],
                'content'     => $_POST['content'],
                'image'       => $_FILES["feature"]["name"],
                'date_create' => time(),
                'author'      => auth()->user()->id
            );

            if($id = $this->ads->insertAds($frm)){
                return redirect('/quan-li-rao-vat');
            }
            $data['frm'] = $frm;

		}

        return view("postads", $data);
	}
	
	public function editAds($id){
		$ads = $this->ads->getAdsById($id);
		$data['edit'] = $id;

        $catads = $this->catads->getCatAds();
        foreach ($catads as $value){
            $data['catads'][$value->id] = $value->title;
        }

        $typeads = $this->typeads->getTypeAds();
        $data['typeads'] = array();
        foreach ($typeads as $value){
            $data['typeads'][$value->id] = $value->title;
        }

        $location = $this->location->getLocation();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

		$data['frm'] = array(
		    'catads'      => $ads->catads,
		    'typeads'     => $ads->typeads,
		    'location'    => $ads->location,
		    'title'       => $ads->title, 
		    'desc'        => $ads->desc, 
		    'content'     => $ads->content,
		    'author'      => auth()->user()->id
        );

		if(!empty($this->request->input('submit'))){
            if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
            }else{
                $_FILES["feature"]["name"] = $ads->image;
            }

			$frm = array(
			    'catads'     => $_POST['catads'],
			    'typeads'    => $_POST['typeads'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"],
                'active'      => 0,
			    'date_update' => time(),  
			    'author'      => auth()->user()->id
            );

			if($this->ads->updateAds($frm,$id)){
				return redirect('/quan-li-rao-vat');
			}else{
				$data['frm'] = $frm;
			}
		}

		return view('postads',$data);
	}

	public function deleteAds($id)
	{
		if(isset($id)){
			return $this->ads->deteleId($id);
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