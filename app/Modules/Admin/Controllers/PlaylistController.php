<?php 
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\PlaylistModel;
use App\Modules\Admin\Models\CatplaylistModel;
use App\Modules\Admin\Models\TypeplaylistModel;
use App\Modules\Admin\Models\MutiModel;
use App\Modules\Admin\Models\SystemModel;
use App\Library\MyFunction;

/**
 * PlaylistController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class PlaylistController extends Controller
{
	function __construct(Request $request)
	{
        $this->images       = 'muti';
        $this->thum_images  = 'thum_muti';
        $this->request      = $request;
		$this->playlistModel    = new PlaylistModel();
		$this->mutiModel    = new MutiModel();
        $this->systemModel  = new SystemModel();
		$this->myFunction   = new MyFunction();
	}

	public function index()
	{
		$data = array();
        if($this->request->get('order') && $this->request->get('by')){
            session(['order' => $this->request->get('order')]);
            session(['by'    => $this->request->get('by')]);
            $data['sort']['order'] = $this->request->get('order');
            $data['sort']['by']    = $this->request->get('by');
        }else{
            $data['sort']['order'] = 'id';
            $data['sort']['by']    = 'DESC';
        }

        if($this->request->input('submit')){
            session(['positions'=> ($this->request->input('positions') != 'choose')? $this->request->input('positions') : null ]);
            session(['title'  => $this->request->input('title')]);
            session(['desc'   => $this->request->input('desc')]);
            session(['from'   => $this->request->input('from')]);
            session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
            $data['filter']['positions']= session('positions');
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

		$result['playlist'] = $this->playlistModel->getData($data);
        $result['positions'] = $this->systemModel->getAll('playlist_position');

		foreach ($result['playlist'] as $key => $val) {
			$result['playlist'][$key]->title = $this->myFunction->trimText($result['playlist'][$key]->title,30);
			$result['playlist'][$key]->desc = $this->myFunction->trimText($result['playlist'][$key]->desc,50);
        }

		return view('Admin::playlist.list',$result);
	}

	public function insertData()
	{
        $data['frm'] = array();
		$data['playlistmuti'] = array();
        $data['positions']      = $this->systemModel->getList('playlist_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

			if(!empty($_FILES["feature"]["name"]))
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"],'image');

			if(!empty($_FILES["file"]["name"]))
				$_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);

            $frm =
                ['id'     	  => NULL,
                'positions'   => $this->request->input('positions'),
                'title'       => $this->request->input('title'),
                'desc'        => $this->request->input('desc'),
                'content'     => $this->request->input('content'),
                'image'       => $_FILES["feature"]["name"],
                'active'      => $this->request->input('active')? 1 : 0,
                'date_create' => time(),
                'author'      => 1];


            if($this->request->input('submit_edit')){
				$id = $this->playlistModel->insertData($frm, $this->request->input('playlist-muti'));
				return redirect('admin/playlist/edit?id='.$id);
			}else{
				$this->playlistModel->insertData($frm);
				return redirect('admin/playlist');
			}

		}elseif(isset($_GET['id'])){
            $id = $this->request->get('id');;
            $playlist = $this->playlistModel->getbyId($id);
            $data['frm'] =
            ['title'      => $playlist->title,
            'positions'   => $playlist->positions,
            'desc'        => $playlist->desc,
            'content'     => $playlist->content,
            'image'       => $playlist->image,
            'active'      => $playlist->active,
            'author'      => 1];
        }
        return view('Admin::Playlist.insert',$data);
	}
	
	public function editData(){
		$id = $this->request->get('id');
        $data['edit'] = $id;

		$playlist = $this->playlistModel->getbyId($id);
        $data['positions']      = $this->systemModel->getList('playlist_position');

		if(isset($_POST['submit']) || isset($_POST['submit_edit'])){
            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

			if(!empty($_FILES["feature"]["name"])){
				$_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"],'image');
			}else{
				$_FILES["feature"]["name"] = $playlist->image;
			}
			$frm =
                ['positions'  => $this->request->input('positions'),
                'title'       => $this->request->input('title'),
                'desc'        => $this->request->input('desc'),
                'content'     => $this->request->input('content'),
                'image'       => $_FILES["feature"]["name"],
                'active'      => $this->request->input('active')? 1 : 0,
                'author'      => 1];

			$data['frm'] = $frm;

            if($this->request->input('submit_edit')){
				$this->playlistModel->updateData($frm,$id);
				return view('Admin::Playlist.insert',$data);
			}else{
				$this->playlistModel->updateData($frm,$id);
				return redirect('admin/playlist');
			}
		}else{
            $data['frm'] =
                ['positions'  => $playlist->positions,
                'title'       => $playlist->title,
                'desc'        => $playlist->desc,
                'content'     => $playlist->content,
                'image'       => $playlist->image,
                'active'      => $playlist->active,
                'author'      => 1];
			return view('Admin::Playlist.insert',$data);
		}
	}

	public function deleteData()
	{
		if(isset($_GET['id'])){
			return $this->playlistModel->deteleId($_GET['id']);
		}
	}

	public function activeData()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->playlistModel->activeId($active,$_GET['id']);
		}
	}

	public function applyData()
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
	public function completeMuti(){
		$complete = $_GET['value'];
		echo $this->mutiModel->completeData($complete);
	}
}
