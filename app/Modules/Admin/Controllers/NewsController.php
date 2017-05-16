<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\NewsModel;
use App\Modules\Admin\Models\CatnewsModel;
use App\Library\MyFunction;

/**
 * NewsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class NewsController extends Controller
{
	function __construct()
	{
		$this->newsModel    = new NewsModel();
		$this->catnewsModel = new CatnewsModel();
		$this->myFunction   = new MyFunction();
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
			session(['catnews'=> ($_POST['catnews']!='choose')? $_POST['catnews'] : null ]);
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['from'   => $_POST['from']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
		}
		$data['filter']['catnews']= session('catnews');
	    $data['filter']['title']  = session('title');
	    $data['filter']['desc']   = session('desc');
	    $data['filter']['from']   = session('from');
	    $data['filter']['active'] = session('active');
		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['catnews'] = $this->catnewsModel->getAll();
		$result['news'] = $this->newsModel->getData($data);
		foreach ($result['news'] as $key => $val) {
			$result['news'][$key]->title = $this->myFunction->trimText($result['news'][$key]->title,30);
			$result['news'][$key]->desc = $this->myFunction->trimText($result['news'][$key]->desc,50);
        }
		return view('Admin::News.list',$result);
	}

	public function insertData()
	{
		$data['catnews'] = $this->catnewsModel->getAll();
		$data['frm'] = "";
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			$frm =  
			    ['id'     	  => NULL,
			    'catnews'     => $_POST['catnews'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'active'      => isset($_POST['active'])? 1 : 0,  
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->newsModel->insertData($frm)){
				return redirect('admin/news/edit?id='.$id);
			}
			$data['frm'] = $frm;
			return view('Admin::News.insert',$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$news = $this->newsModel->getbyId($id);
				$data['catnews'] = $this->catnewsModel->getAll();
				$data['frm'] =  
			    ['catnews'    => $news->catnews,
			    'title'       => $news->title, 
			    'desc'        => $news->desc, 
			    'content'     => $news->content, 
			    'image'       => $news->image,
			    'from'        => $news->from, 
			    'active'      => $news->active,  
			    'author'      => 1];
				return view('Admin::News.insert',$data);
			}
			return view('Admin::News.insert',$data);
		}
	}
	
	public function editData(){
		$id = $_GET['id'];
		$news = $this->newsModel->getbyId($id);
		$data['edit'] = $id;
		$data['catnews'] = $this->catnewsModel->getAll();
		$data['frm'] =  
		   ['catnews'     => $news->catnews,
		    'title'       => $news->title, 
		    'desc'        => $news->desc, 
		    'content'     => $news->content, 
		    'from'        => $news->from, 
		    'image'       => $news->image, 
		    'active'      => $news->active,  
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			}else{
				$_FILES["feature"]["name"] = $news->image;
			}
			$frm =  
			   ['catnews'     => $_POST['catnews'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'from'        => $_POST['from'], 
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_update' => time(),  
			    'author'      => 1];
			$this->newsModel->updateData($frm,$id);
			$data['frm'] = $frm;
			return view('Admin::News.insert',$data);
		}else{
			return view('Admin::News.insert',$data);
		}
	}

	public function deleteData()
	{
		if(isset($_GET['id'])){
			return $this->newsModel->deteleId($_GET['id']);
		}
	}

	public function activeData()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->newsModel->activeId($active,$_GET['id']);
		}
	}

	public function applyData()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->newsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->newsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->newsModel->deteleId($val);		
					}
				break;
			}
		}
	}
	public function updateRss()
	{
		$this->newsModel->importRss('http://vnexpress.net/rss/tin-moi-nhat.rss','VnExpress');
	}
}
