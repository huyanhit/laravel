<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\MutiModel;
use App\Modules\Admin\Models\PlaylistModel;
use App\Modules\Admin\Models\PlaylistmutiModel;
use App\Modules\Admin\Models\CatmutiModel;
use App\Modules\Admin\Models\TypemutiModel;
use App\Library\MyFunction;

/**
 * MutiController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class MutiController extends Controller
{
	function __construct()
	{
		$this->mutiModel    = new MutiModel();
		$this->playlistModel    = new PlaylistModel();
		$this->playlistmutiModel = new PlaylistmutiModel();
		$this->catmutiModel = new CatmutiModel();
		$this->typemutiModel = new TypemutiModel();
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
			session(['catmuti'=> ($_POST['catmuti']!='choose')? $_POST['catmuti'] : null ]);
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
			$data['filter']['catmuti']= session('catmuti');
		    $data['filter']['title']  = session('title');
		    $data['filter']['desc']   = session('desc');
		    $data['filter']['active'] = session('active');
		}

		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['catmuti'] = $this->catmutiModel->getAll();
		$result['typemuti'] = $this->typemutiModel->getAll();
		$result['muti'] = $this->mutiModel->getAll($data);
		foreach ($result['muti'] as $key => $val) {
			$result['muti'][$key]->title = $this->myFunction->trimText($result['muti'][$key]->title,30);
			$result['muti'][$key]->desc = $this->myFunction->trimText($result['muti'][$key]->desc,50);
        }
		return view('Admin::muti.list',$result);
	}

	public function insertMuti()
	{
		$data['catmuti'] = $this->catmutiModel->getAll();
		$data['typemuti'] = $this->typemutiModel->getAll();
		$data['frm'] = "";
		$data['playlistmuti'] = array();
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			if(!empty($_FILES["file"]["name"]))
				$_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);
			$frm =  
			    ['id'     	  => NULL,
			    'catmuti'     => $_POST['catmuti'],
			    'typemuti'    => $_POST['typemuti'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'file'        => $_FILES["file"]["name"], 
			    'active'      => isset($_POST['active'])? 1 : 0,  
			    'date_create' => time(), 
			    'author'      => 1];
			if($id = $this->mutiModel->insertMuti($frm,$_POST['playlist-muti'])){
				return redirect('admin/muti/edit?id='.$id);
			}
			$data['frm'] = $frm;
			return view('Admin::Muti.insert',$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$muti = $this->mutiModel->getmutibyId($id);
				$data['catmuti'] = $this->catmutiModel->getAll();
				$data['typemuti'] = $this->typemutiModel->getAll();
				$data['frm'] =  
			    ['catmuti'    => $muti->catmuti,
			    'typemuti'    => $muti->typemuti,
			    'title'       => $muti->title, 
			    'desc'        => $muti->desc, 
			    'content'     => $muti->content, 
			    'image'       => $muti->image,
			    'active'      => $muti->active,  
			    'author'      => 1];
				return view('Admin::Muti.insert',$data);
			}
			return view('Admin::Muti.insert',$data);
		}
	}
	
	public function editMuti(){
		$id = $_GET['id'];
		$muti = $this->mutiModel->getmutibyId($id);
		$playlistmuti = $this->playlistmutiModel->getplaylistmutibyId($id);
		$data['playlistmuti'] = $playlistmuti;
		$data['edit'] = $id;
		$data['catmuti'] = $this->catmutiModel->getAll();
		$data['typemuti'] = $this->typemutiModel->getAll();
		$data['frm'] =  
		   ['catmuti'     => $muti->catmuti,
		    'typemuti'    => $muti->typemuti,
		    'title'       => $muti->title, 
		    'desc'        => $muti->desc, 
		    'content'     => $muti->content, 
		    'active'      => $muti->active,  
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			}else{
				$_FILES["feature"]["name"] = $muti->file;
			}

			if(!empty($_FILES["file"]["name"])){
				$_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);
			}else{
				$_FILES["file"]["name"] = $muti->file;
			}
			$frm =  
			   ['catmuti'     => $_POST['catmuti'],
			    'typemuti'    => $_POST['typemuti'],
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'file'        => $_FILES["file"]["name"],
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_update' => time(),  
			    'author'      => 1];
			$this->mutiModel->updateMuti($frm,$id,$_POST['playlist-muti']);
			$playlistmuti = $this->playlistmutiModel->getplaylistmutibyId($id);
			$data['playlistmuti'] = $playlistmuti;
			$data['frm'] = $frm;
			return view('Admin::Muti.insert',$data);
		}else{
			return view('Admin::Muti.insert',$data);
		}
	}

	public function deleteMuti()
	{
		if(isset($_GET['id'])){
			return $this->mutiModel->deteleId($_GET['id']);
		}
	}

	public function activeMuti()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->mutiModel->activeId($active,$_GET['id']);
		}
	}

	public function applyMuti()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->mutiModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->mutiModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->mutiModel->deteleId($val);		
					}
				break;
			}
		}
	}
	public function completePlaylist(){
		$complete = $_GET['value'];
		echo $this->playlistModel->completeMuti($complete);
	}
}
