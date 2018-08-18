<?php
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\AdsModel;
use App\Modules\Admin\Models\CatadsModel;
use App\Modules\Admin\Models\TypeadsModel;
use App\Modules\Admin\Models\LocationModel;
use App\Modules\Admin\Models\SystemModel;
use App\Library\MyFunction;

/**
 * adsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class AdsController extends Controller
{
    function __construct(Request $request)
    {
        $this->middleware('authAdmin');
        $this->images       = 'ads';
        $this->thum_images  = 'thum_ads';
        $this->request      = $request;
        $this->adsModel    = new AdsModel();
        $this->catadsModel = new CatadsModel();
        $this->typeadsModel = new TypeadsModel();
        $this->locationModel = new LocationModel();
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
            session(['catads'=> ($this->request->input('catads') != 'choose')? $this->request->input('catads') : null ]);
            session(['positions'=> ($this->request->input('positions') != 'choose')? $this->request->input('positions') : null ]);
            session(['title'  => $this->request->input('title')]);
            session(['desc'   => $this->request->input('desc')]);
            session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
        }

        if(isset($_POST['submit'])){
            session(['catads'=> ($_POST['catads']!='choose')? $_POST['catads'] : null ]);
            session(['title'  => $_POST['title']]);
            session(['desc'   => $_POST['desc']]);
            session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
        }

        $data['filter']['catads']= session('catads');
        $data['filter']['positions']= session('positions');
        $data['filter']['title']  = session('title');
        $data['filter']['desc']   = session('desc');
        $data['filter']['active'] = session('active');

        if(!empty(session('order')) && !empty(session('by'))){
            $result['urlsort'] = '?order='.session('order').'&by='.session('by');
        }else{
            $result['urlsort'] = "";
        }
        $result['catads'] = $this->catadsModel->getAll();
        $result['typeads'] = $this->typeadsModel->getAll();
        $result['location'] = $this->locationModel->getAll();
        $result['positions'] = $this->systemModel->getAll('ads_position');
        $result['ads'] = $this->adsModel->getData($data);
        foreach ($result['ads'] as $key => $val) {
            $result['ads'][$key]->title = $this->myFunction->trimText($result['ads'][$key]->title,30);
            $result['ads'][$key]->desc = $this->myFunction->trimText($result['ads'][$key]->desc,50);
        }
        return view('Admin::Ads.list',$result);
    }

    public function insertData()
    {
        $data['frm'] = array();
        $catads = $this->catadsModel->getAll();
        $data['catads'] = array();
        foreach ($catads as $value){
            $data['catads'][$value->id] = $value->title;
        }

        $typeads = $this->typeadsModel->getAll();
        $data['typeads'] = array();
        foreach ($typeads as $value){
            $data['typeads'][$value->id] = $value->title;
        }

        $location = $this->locationModel->getAll();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('ads_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catads' => 'required',
                'positions' => 'required',
                'typeads'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);

            $frm =
                ['id'     	  => NULL,
                    'catads'     => $this->request->input('catads'),
                    'positions'   => $this->request->input('positions'),
                    'typeads'    => $this->request->input('typeads'),
                    'location'    => $this->request->input('location'),
                    'title'       => $this->request->input('title'),
                    'desc'        => $this->request->input('desc'),
                    'content'     => $this->request->input('content'),
                    'image'       => $_FILES["feature"]["name"],
                    'active'      => $this->request->input('active')? 1 : 0,
                    'date_create' => time(),
                    'author'      => 1];

            if($this->request->input('submit_edit')){
                $id = $this->adsModel->insertData($frm);
                return redirect('admin/ads/edit?id='.$id);
            }else{
                $this->adsModel->insertData($frm);
                return redirect('admin/ads');
            }

        }elseif($this->request->get('id')){
            $id = $this->request->get('id');
            $ads = $this->adsModel->getbyId($id);
            $data['frm'] =
                ['catads'    => $ads->catads,
                    'positions'   => $ads->positions,
                    'typeads'    => $ads->typeads,
                    'location'    => $ads->location,
                    'title'       => $ads->title,
                    'desc'        => $ads->desc,
                    'content'     => $ads->content,
                    'image'       => $ads->image,
                    'active'      => $ads->active,
                    'author'      => 1];
        }

        return view('Admin::Ads.insert',$data);
    }

    public function editData(){
        $id = $this->request->get('id');
        $data['edit'] = $id;

        $catads = $this->catadsModel->getAll();
        $data['catads'] = array();
        foreach ($catads as $value){
            $data['catads'][$value->id] = $value->title;
        }

        $typeads = $this->typeadsModel->getAll();
        $data['typeads'] = array();
        foreach ($typeads as $value){
            $data['typeads'][$value->id] = $value->title;
        }

        $location = $this->locationModel->getAll();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('ads_position');

        $ads = $this->adsModel->getbyId($id);
        if($this->request->input('submit') || $this->request->input('submit_edit')){
            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catads' => 'required',
                'positions' => 'required',
                'typeads'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
            }else{
                $_FILES["feature"]["name"] = $ads->image;
            }

            $data['frm'] =
                ['catads'    => $this->request->input('catads'),
                    'positions'   => $this->request->input('positions'),
                    'typeads'    => $this->request->input('typeads'),
                    'location'    => $this->request->input('location'),
                    'title'       => $this->request->input('title'),
                    'desc'        => $this->request->input('desc'),
                    'content'     => $this->request->input('content'),
                    'image'       => $_FILES["feature"]["name"],
                    'active'      => $this->request->input('active')? 1 : 0,
                    'date_update' => time(),
                    'author'      => 1];

            if($this->request->input('submit_edit')){
                $this->adsModel->updateData($data['frm'], $id);

                return view('Admin::ads.insert',$data);
            }else{
                $this->adsModel->updateData($data['frm'], $id);

                return redirect('admin/ads');
            }
        }else{
            $data['frm'] =
                ['catads'    => $ads->catads,
                    'positions'   => $ads->positions,
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
    }

    public function deleteData()
    {
        if($this->request->get('id')){
            return $this->adsModel->deteleId($this->request->get('id'));
        }
    }

    public function activeData()
    {
        $active = 0;
        if($this->request->get('check') == 'true'){
            $active = 1;
        }
        if($this->request->get('id')){
            return $this->adsModel->activeId($active,$this->request->get('id'));
        }
    }

    public function applyData()
    {
        if($this->request->get('action')){
            switch ((int)$this->request->get('action')) {
                case 1:
                    foreach ($this->request->get('data') as $val) {
                        $this->adsModel->activeId(1,$val);
                    }
                    break;
                case 2:
                    foreach ($this->request->get('data') as $val) {
                        $this->adsModel->activeId(0,$val);
                    }
                    break;
                case 3:
                    foreach ($this->request->get('data') as $val) {
                        $this->adsModel->deteleId($val);
                    }
                    break;
            }
        }
    }
}
