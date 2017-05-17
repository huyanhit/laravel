<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\AdsModel;
use App\Modules\Admin\Models\CatadsModel;
use App\Modules\Admin\Models\TypeadsModel;
use App\Modules\Admin\Models\LocationModel;
use App\Library\MyFunction;

/**
 * AdsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class AdsController extends Controller
{
	function __construct()
	{
		$this->adsModel      = new AdsModel();
		$this->catadsModel   = new CatadsModel();
		$this->typeadsModel  = new TypeadsModel();
		$this->locationModel = new LocationModel();
		$this->myFunction    = new MyFunction();
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
			session(['catads' => ($_POST['catads']!='choose')? $_POST['catads'] : null ]);
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
			$data['filter']['catads'] = session('catads');
		    $data['filter']['title']  = session('title');
		    $data['filter']['desc']   = session('desc');
		    $data['filter']['active'] = session('active');
		}

		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['catads'] = $this->catadsModel->getAll();
		$result['typeads'] = $this->typeadsModel->getAll();
		$result['location'] = $this->locationModel->getAll();
		$result['ads'] = $this->adsModel->getData($data);
		foreach ($result['ads'] as $key => $val) {
			$result['ads'][$key]->title = $this->myFunction->trimText($result['ads'][$key]->title,30);
			$result['ads'][$key]->desc = $this->myFunction->trimText($result['ads'][$key]->desc,50);
        }
		return view('Admin::ads.list',$result);
	}

	public function insertData()
	{
		$data['catads'] = $this->catadsModel->getAll();
		$data['typeads'] = $this->typeadsModel->getAll();
		$data['location'] = $this->locationModel->getAll();
		$data['frm'] = "";
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"],'image');
			$frm =  
			    ['id'     	  => NULL,
			    'catads'      => $_POST['catads'],
			    'typeads'     => $_POST['typeads'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'active'      => isset($_POST['active'])? 1 : 0,  
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->adsModel->insertData($frm)){
				return redirect('admin/ads/edit?id='.$id);
			}
			$data['frm'] = $frm;
			return view('Admin::Ads.insert',$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$ads = $this->adsModel->getbyId($id);
				$data['catads'] = $this->catadsModel->getAll();
				$data['typeads'] = $this->typeadsModel->getAll();
				$data['location'] = $this->locationModel->getAll();
				$data['frm'] =  
			    ['catads'    => $ads->catads,
			    'typeads'    => $ads->typeads,
			    'location'    => $ads->location,
			    'title'       => $ads->title, 
			    'desc'        => $ads->desc, 
			    'content'     => $ads->content, 
			    'image'       => $ads->image,
			    'active'      => $ads->active,  
			    'author'      => 1];
				return view('Admin::Ads.insert',$data);
			}
			return view('Admin::Ads.insert',$data);
		}
	}
	
	public function editData(){
		$id = $_GET['id'];
		$ads = $this->adsModel->getadsbyId($id);
		$data['edit'] = $id;
		$data['catads'] = $this->catadsModel->getAll();
		$data['typeads'] = $this->typeadsModel->getAll();
		$data['location'] = $this->locationModel->getAll();
		$data['frm'] =  
		   ['catads'      => $ads->catads,
		    'typeads'     => $ads->typeads,
		    'location'    => $ads->location,
		    'title'       => $ads->title, 
		    'desc'        => $ads->desc, 
		    'content'     => $ads->content, 
		    'active'      => $ads->active,  
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"],'image');
			}else{
				$_FILES["feature"]["name"] = $ads->image;
			}
			$frm =  
			   ['catads'      => $_POST['catads'],
			    'typeads'     => $_POST['typeads'],
			    'location'    => $_POST['location'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_update' => time(),  
			    'author'      => 1];
			$this->adsModel->updateData($frm,$id);
			$data['frm'] = $frm;
			return view('Admin::Ads.insert',$data);
		}else{
			return view('Admin::Ads.insert',$data);
		}
	}

	public function deleteData()
	{
		if(isset($_GET['id'])){
			return $this->adsModel->deteleId($_GET['id']);
		}
	}

	public function activeData()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->adsModel->activeId($active,$_GET['id']);
		}
	}

	public function applyData()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->adsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->adsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->adsModel->deteleId($val);		
					}
				break;
			}
		}
	}
}
