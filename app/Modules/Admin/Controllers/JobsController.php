<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\JobsModel;
use App\Modules\Admin\Models\CatjobsModel;
use App\Modules\Admin\Models\TypejobsModel;
use App\Modules\Admin\Models\LocationModel;
use App\Library\MyFunction;

/**
 * JobsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class JobsController extends Controller
{
	function __construct()
	{
		$this->jobsModel    = new JobsModel();
		$this->catjobsModel = new CatjobsModel();
		$this->typejobsModel = new TypejobsModel();
		$this->locationModel = new LocationModel();
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
			session(['catjobs'=> ($_POST['catjobs']!='choose')? $_POST['catjobs'] : null ]);
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['from'   => $_POST['from']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
			$data['filter']['catjobs']= session('catjobs');
		    $data['filter']['title']  = session('title');
		    $data['filter']['desc']   = session('desc');
		    $data['filter']['from']   = session('from');
		    $data['filter']['active'] = session('active');
		}

		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['catjobs'] = $this->catjobsModel->getAll();
		$result['typejobs'] = $this->typejobsModel->getAll();
		$result['location'] = $this->locationModel->getAll();
		$result['jobs'] = $this->jobsModel->getData($data);
		foreach ($result['jobs'] as $key => $val) {
			$result['jobs'][$key]->title = $this->myFunction->trimText($result['jobs'][$key]->title,30);
			$result['jobs'][$key]->desc = $this->myFunction->trimText($result['jobs'][$key]->desc,50);
        }
		return view('Admin::jobs.list',$result);
	}

	public function insertData()
	{
		$data['catjobs'] = $this->catjobsModel->getAll();
		$data['typejobs'] = $this->typejobsModel->getAll();
		$data['location'] = $this->locationModel->getAll();
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
			    'active'      => isset($_POST['active'])? 1 : 0,  
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->jobsModel->insertData($frm)){
				return redirect('admin/jobs/edit?id='.$id);
			}
			$data['frm'] = $frm;
			return view('Admin::Jobs.insert',$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$jobs = $this->jobsModel->getbyId($id);
				$data['catjobs'] = $this->catjobsModel->getAll();
				$data['typejobs'] = $this->typejobsModel->getAll();
				$data['location'] = $this->locationModel->getAll();
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
				return view('Admin::Jobs.insert',$data);
			}
			return view('Admin::Jobs.insert',$data);
		}
	}
	
	public function editData(){
		$id = $_GET['id'];
		$jobs = $this->jobsModel->getbyId($id);
		$data['edit'] = $id;
		$data['catjobs'] = $this->catjobsModel->getAll();
		$data['typejobs'] = $this->typejobsModel->getAll();
		$data['location'] = $this->locationModel->getAll();
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
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_update' => time(),  
			    'author'      => 1];
			$this->jobsModel->updateData($frm,$id);
			$data['frm'] = $frm;
			return view('Admin::Jobs.insert',$data);
		}else{
			return view('Admin::Jobs.insert',$data);
		}
	}

	public function deleteData()
	{
		if(isset($_GET['id'])){
			return $this->jobsModel->deteleId($_GET['id']);
		}
	}

	public function activeData()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->jobsModel->activeId($active,$_GET['id']);
		}
	}

	public function applyData()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->jobsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->jobsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->jobsModel->deteleId($val);		
					}
				break;
			}
		}
	}

}
