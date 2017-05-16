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
class CatnewsController extends Controller
{
	function __construct()
	{
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
			session(['icon'  => $_POST['icon']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
		}
		$data['filter']['title']= session('title');
		$data['filter']['icon']= session('icon');
	    $data['filter']['active'] = session('active');
		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['data'] = $this->catnewsModel->getData($data);
		return view('Admin::Catnews.list',$result);
	}

	public function insertData()
	{
		$data['frm'] = "";
		if(isset($_POST['submit']) || isset($_POST['submit_edit'])){
			$frm =  
			    ['id'     	  => NULL,
			    'title'       => $_POST['title'], 
			    'icon'        => $_POST['icon'], 
			    'active'      => isset($_POST['active'])? 1 : 0];
			if(isset($_POST['submit_edit'])){
				$id = $this->catnewsModel->insertData($frm);
				return redirect('admin/catnews/edit?id='.$id);
			}else{
				$this->catnewsModel->insertData($frm);
				return redirect('admin/catnews');
			}
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$catnews = $this->catnewsModel->getbyId($id);
				$data['frm'] =  
			    ['title'       => $catnews->title,
			    'icon'        => $catnews->icon, 
			    'active'      => $catnews->active];
				return view('Admin::Catnews.insert',$data);
			}
			return view('Admin::Catnews.insert',$data);
		}
	}
	
	public function editData(){
		$id = $_GET['id'];
		$catnews = $this->catnewsModel->getbyId($id);
		$data['edit'] = $id;
		$data['frm'] =  
		   ['title'       => $catnews->title,
		    'icon'        => $catnews->icon, 
		    'active'      => $catnews->active];
		if(isset($_POST['submit'])){
			$frm =  
			   ['title'       => $_POST['title'], 
			    'icon'        => $_POST['icon'], 
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    ];
			$this->catnewsModel->updateData($frm,$id);
			$data['frm'] = $frm;
			return view('Admin::Catnews.insert',$data);
		}else{
			return view('Admin::Catnews.insert',$data);
		}
	}

	public function deleteData()
	{
		if(isset($_GET['id'])){
			return $this->catnewsModel->deteleId($_GET['id']);
		}
	}

	public function activeData()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->catnewsModel->activeId($active,$_GET['id']);
		}
	}

	public function applyData()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->catnewsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->catnewsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->catnewsModel->deteleId($val);		
					}
				break;
			}
		}
	}
}
