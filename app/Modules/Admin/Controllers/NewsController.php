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
		session()->regenerate();
		if(!isset($_GET['order'])){
			session(['filter'=>null]);
			session(['sort'=>null]);
		}
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
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['from'   => $_POST['from']]);
			session(['active' => ($_POST['active']=='active')?1:0]);
		    $data['filter']['title']  = session('title');
		    $data['filter']['desc']   = session('desc');
		    $data['filter']['from']   = session('from');
		    $data['filter']['active'] = session('active');
		}
		$result['news'] = $this->newsModel->getAll($data);
		return view('Admin::News.list',$result);
	}

	public function insertNews()
	{
		$data['catnews'] = $this->catnewsModel->getAll();

		if(isset($_POST['submit'])){
			if($this->myFunction->uploadImage($_FILES["feature"])){
				$frm =  
				    ['id'     	  => NULL,
				    'catnews'     => $_POST['category'],
				    'title'       => $_POST['title'], 
				    'desc'        => $_POST['desc'], 
				    'content'     => $_POST['content'], 
				    'image'       => $_FILES["feature"]["name"], 
				    'from'        => $_POST['from'], 
				    'active'      => isset($_POST['active'])? 1 : 0,  
				    'date_create' => date('m/d/Y h:i:s a'), 
				    'author'      => 1];
				$this->newsModel->insertNews($frm);
			}
			return view('Admin::News.insert',$data);
		}else{
			return view('Admin::News.insert',$data);
		}
	}

	public function deleteNews()
	{
		if(isset($_GET['id'])){
			return $this->newsModel->deteleId($_GET['id']);
		}
	}

	public function activeNews()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->newsModel->activeId($active,$_GET['id']);
		}
	}
}
