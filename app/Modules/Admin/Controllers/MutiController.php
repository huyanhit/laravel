<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\MutiModel;
use App\Modules\Admin\Models\PlaylistModel;
use App\Modules\Admin\Models\CatmutiModel;
use App\Modules\Admin\Models\TypemutiModel;
use App\Modules\Admin\Models\SystemModel;
use App\Modules\Admin\Models\MutiPlaylistModel;
use App\Library\MyFunction;

/**
 * MutiController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class MutiController extends Controller
{
    function __construct(Request $request)
    {
        $this->middleware('authAdmin');
        $this->images        = 'muti';
        $this->thum_images   = 'thum_muti';
        $this->request       = $request;
        $this->mutiModel     = new MutiModel();
        $this->playlistModel = new PlaylistModel();
        $this->catmutiModel  = new CatmutiModel();
        $this->typemutiModel = new TypemutiModel();
        $this->systemModel   = new SystemModel();
        $this->myFunction    = new MyFunction();
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
            session(['catmuti'=> ($this->request->input('catmuti') != 'choose')? $this->request->input('catmuti') : null ]);
            session(['positions'=> ($this->request->input('positions') != 'choose')? $this->request->input('positions') : null ]);
            session(['title'  => $this->request->input('title')]);
            session(['desc'   => $this->request->input('desc')]);
            session(['from'   => $this->request->input('from')]);
            session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
        }

        $data['filter']['catmuti']= session('catmuti');
        $data['filter']['positions']= session('positions');
        $data['filter']['title']  = session('title');
        $data['filter']['desc']   = session('desc');
        $data['filter']['from']   = session('from');
        $data['filter']['active'] = session('active');

        if(!empty(session('order')) && !empty(session('by'))){
            $result['urlsort'] = '?order='.session('order').'&by='.session('by');
        }else{
            $result['urlsort'] = "";
        }

        $result['catmuti'] = $this->catmutiModel->getAll();
        $result['typemuti'] = $this->typemutiModel->getAll();
        $result['muti'] = $this->mutiModel->getData($data);
        $result['positions'] = $this->systemModel->getAll('muti_position');

        foreach ($result['muti'] as $key => $val) {
            $result['muti'][$key]->title = $this->myFunction->trimText($result['muti'][$key]->title,30);
            $result['muti'][$key]->desc = $this->myFunction->trimText($result['muti'][$key]->desc,50);
        }

        return view('Admin::Muti.list',$result);
    }

    public function insertData()
    {
        $data['frm'] = array();
        $catmuti= $this->catmutiModel->getAll();
        $data['catmuti'] = array();
        foreach ($catmuti as $value){
            $data['catmuti'][$value->id] = $value->title;
        }

        $typemuti = $this->typemutiModel->getAll();
        $data['typemuti'] = array();
        foreach ($typemuti as $value){
            $data['typemuti'][$value->id] = $value->title;
        }

        $playlist = $this->playlistModel->getAll();
        $data['playlist'] = array();
        foreach ($playlist as $value){
            $data['playlist'][$value->id] = $value->title;
        }

        $data['positions']= $this->systemModel->getList('muti_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catmuti' => 'required',
                'typemuti' => 'required',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"],$this->images, $this->thum_images);

            if(!empty($_FILES["file"]["name"]))
                $_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);

            $frm =
                ['id'     	  => NULL,
                    'catmuti'     => $this->request->input('catmuti'),
                    'typemuti'    => $this->request->input('typemuti'),
                    'playlist'    => $this->request->input('playlist'),
                    'positions'   => $this->request->input('positions'),
                    'title'       => $this->request->input('title'),
                    'desc'        => $this->request->input('desc'),
                    'content'     => $this->request->input('content'),
                    'image'       => $_FILES["feature"]["name"],
                    'file'        => $_FILES["file"]["name"],
                    'link_file'   => $this->request->input('link_file'),
                    'active'      => $this->request->input('active')? 1 : 0,
                    'date_create' => time(),
                    'author'      => 1];

            if($this->request->input('submit_edit')){
                $id = $this->mutiModel->insertData($frm, $this->request->input('playlist-muti'));
                return redirect('admin/muti/edit?id='.$id);
            }else{
                $this->mutiModel->insertData($frm);
                return redirect('admin/muti');
            }

        } elseif($this->request->get('id')){
            $id = $this->request->get('id');
            $muti = $this->mutiModel->getbyId($id);

            $data['frm'] =
                ['catmuti'    => $muti->catmuti,
                    'typemuti'    => $muti->typemuti,
                    'playlist'    => $muti->playlist,
                    'positions'   => $muti->positions,
                    'title'       => $muti->title,
                    'desc'        => $muti->desc,
                    'content'     => $muti->content,
                    'image'       => $muti->image,
                    'link_file'   => $muti->link_file,
                    'active'      => $muti->active,
                    'author'      => 1];
        }

        return view('Admin::Muti.insert',$data);
    }

    public function editData(){

        $id = $this->request->get('id');
        $data['edit'] = $id;

        $muti = $this->mutiModel->getbyId($id);

        $catmuti= $this->catmutiModel->getAll();
        $data['catmuti'] = array();
        foreach ($catmuti as $value){
            $data['catmuti'][$value->id] = $value->title;
        }

        $typemuti = $this->typemutiModel->getAll();
        $data['typemuti'] = array();
        foreach ($typemuti as $value){
            $data['typemuti'][$value->id] = $value->title;
        }

        $playlist = $this->playlistModel->getAll();
        $data['playlist'] = array();
        foreach ($playlist as $value){
            $data['playlist'][$value->id] = $value->title;
        }
        $data['positions']      = $this->systemModel->getList('muti_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catmuti' => 'required',
                'typemuti' => 'required',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
            }else{
                $_FILES["feature"]["name"] = $muti->image;
            }

            if(!empty($_FILES["file"]["name"])){
                $_FILES["file"]["name"] = $this->myFunction->uploadFile($_FILES["file"]);
            }else{
                $_FILES["file"]["name"] = $muti->file;
            }

            $data['frm'] =
                ['catmuti'    => $this->request->input('catmuti'),
                    'typemuti'    => $this->request->input('typemuti'),
                    'playlist'    => $this->request->input('playlist'),
                    'positions'   => $this->request->input('positions'),
                    'title'       => $this->request->input('title'),
                    'desc'        => $this->request->input('desc'),
                    'content'     => $this->request->input('content'),
                    'image'       => $_FILES["feature"]["name"],
                    'file'        => $_FILES["file"]["name"],
                    'link_file'   => $this->request->input('link_file'),
                    'active'      => $this->request->input('active')? 1 : 0,
                    'date_create' => time(),
                    'author'      => 1];

            if($this->request->input('submit_edit')){
                $this->mutiModel->updateData($data['frm'], $id, $this->request->input('playlist-muti'));
                return view('Admin::Muti.insert',$data);
            }else{
                $this->mutiModel->updateData($data['frm'], $id, $this->request->input('playlist-muti'));
                return redirect('admin/muti');
            }

        }else{
            $data['frm'] =
                ['catmuti'    => $muti->catmuti,
                    'typemuti'    => $muti->typemuti,
                    'positions'   => $muti->positions,
                    'playlist'    => $muti->playlist,
                    'title'       => $muti->title,
                    'desc'        => $muti->desc,
                    'content'     => $muti->content,
                    'image'       => $muti->image,
                    'file'        => $muti->file,
                    'link_file'   => $muti->link_file,
                    'active'      => $muti->active,
                    'author'      => 1];
            return view('Admin::Muti.insert',$data);
        }
    }

    public function deleteData()
    {
        if(isset($_GET['id'])){
            return $this->mutiModel->deteleId($this->request->get('id'));
        }
    }

    public function activeData()
    {
        $active = 0;
        if($_GET['check'] == 'true'){
            $active = 1;
        }
        if(isset($_GET['id'])){
            return $this->mutiModel->activeId($active,$this->request->get('id'));
        }
    }

    public function applyData()
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

    public function completeData(){
        $id = $_GET['id'];
        $complete = $_GET['value'];
        echo $this->playlistModel->completeData($id,$complete);
    }

    public function updateMutiPlaylist(){
        $mutiId = $_POST['muti_id'];
        $playlistId = $_POST['playlist_id'];
        $option = $_POST['option'];
        $this->mutiPlaylistModel  = new MutiPlaylistModel();
        echo $this->mutiPlaylistModel->updateData($mutiId, $playlistId, $option);
    }
}
