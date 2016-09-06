<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\PlaylistModel;
use App\Modules\Admin\Models\CatplaylistModel;
use App\Modules\Admin\Models\TypeplaylistModel;
use App\Modules\Admin\Models\MutiModel;
use App\Library\MyFunction;

/**
 * PlaylistController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class PlaylistController extends Controller
{
	function __construct()
	{
		$this->playlistModel    = new PlaylistModel();
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
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
		    $data['filter']['title']  = session('title');
		    $data['filter']['desc']   = session('desc');
		    $data['filter']['active'] = session('active');
		}

		if(!empty(session('order')) && !empty(session('by'))){
			$result['urlsort'] = '?order='.session('order').'&by='.session('by');
		}else{
			$result['urlsort'] = "";
		}
		$result['playlist'] = $this->playlistModel->getAll($data);
		foreach ($result['playlist'] as $key => $val) {
			$result['playlist'][$key]->title = $this->myFunction->trimText($result['playlist'][$key]->title,30);
			$result['playlist'][$key]->desc = $this->myFunction->trimText($result['playlist'][$key]->desc,50);
        }
		return view('Admin::playlist.list',$result);
	}

	public function insertPlaylist()
	{
		$data['frm'] = "";
		$data['playlistmuti'] = array();
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			if(!empty($_FILES["file"]["name"]))
				$_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);
			$frm =  
			    ['id'     	  => NULL,
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_create' => time(), 
			    'author'      => 1];

			if($id = $this->playlistModel->insertPlaylist($frm,$_POST['playlist-muti'])){
				return redirect('admin/playlist/edit?id='.$id);
			}
			$data['frm'] = $frm;
			return view('Admin::Playlist.insert',$data);
		}else{
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$playlist = $this->playlistModel->getplaylistbyId($id);
				$data['frm'] =  
			    [
			   	'title'       => $playlist->title, 
			    'desc'        => $playlist->desc, 
			    'content'     => $playlist->content, 
			    'image'       => $playlist->image,
			    'active'      => $playlist->active, 
			    'author'      => 1];
				return view('Admin::Playlist.insert',$data);
			}
			return view('Admin::Playlist.insert',$data);
		}
	}
	
	public function editPlaylist(){
		$id = $_GET['id'];
		$playlist = $this->playlistModel->getplaylistbyId($id);
		$playlistmuti = $this->playlistModel->getplaylistmutibyId($id);
		$data['playlistmuti'] = $playlistmuti;
		$data['edit'] = $id;
		$data['frm'] =  
		   [
		    'title'       => $playlist->title, 
		    'desc'        => $playlist->desc, 
		    'content'     => $playlist->content, 
		    'active'      => $playlist->active,  
		    'author'      => 1];
		if(isset($_POST['submit'])){
			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"]);
			}else{
				$_FILES["feature"]["name"] = $playlist->image;
			}
			$frm =  
			   [
			    'title'       => $_POST['title'], 
			    'desc'        => $_POST['desc'], 
			    'content'     => $_POST['content'], 
			    'image'       => $_FILES["feature"]["name"], 
			    'active'      => isset($_POST['active'])? 1 : 0, 
			    'date_update' => time(),  
			    'author'      => 1];
			$this->playlistModel->updateplaylist($frm,$id,$_POST['playlist-muti']);
			$data['frm'] = $frm;
			return view('Admin::Playlist.insert',$data);
		}else{
			return view('Admin::Playlist.insert',$data);
		}
	}

	public function deletePlaylist()
	{
		if(isset($_GET['id'])){
			return $this->playlistModel->deteleId($_GET['id']);
		}
	}

	public function activePlaylist()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->playlistModel->activeId($active,$_GET['id']);
		}
	}

	public function applyPlaylist()
	{
		if(isset($_POST['action'])){
			switch ((int)$_POST['action']) {
				case 1:
					foreach ($_POST['data'] as $val) {
						$this->playlistModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($_POST['data'] as $val) {
						$this->playlistModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($_POST['data'] as $val) {
						$this->playlistModel->deteleId($val);		
					}
				break;
			}
		}
	}
	public function completePlaylist(){
		$complete = $_GET['value'];
		echo $this->playlistModel->completePlaylist($complete);
	}
}
