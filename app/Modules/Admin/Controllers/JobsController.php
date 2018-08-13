<?php 
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\JobsModel;
use App\Modules\Admin\Models\CatjobsModel;
use App\Modules\Admin\Models\TypejobsModel;
use App\Modules\Admin\Models\LocationModel;
use App\Modules\Admin\Models\SystemModel;
use App\Library\MyFunction;

/**
 * JobsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class JobsController extends Controller
{
	function __construct(Request $request)
	{
        $this->middleware('authAdmin');
        $this->images       = 'jobs';
        $this->thum_images  = 'thum_jobs';
        $this->request      = $request;
        $this->jobsModel    = new JobsModel();
        $this->catjobsModel = new CatjobsModel();
        $this->typejobsModel = new TypejobsModel();
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
            session(['catjobs'=> ($this->request->input('catjobs') != 'choose')? $this->request->input('catjobs') : null ]);
            session(['positions'=> ($this->request->input('positions') != 'choose')? $this->request->input('positions') : null ]);
            session(['title'  => $this->request->input('title')]);
            session(['desc'   => $this->request->input('desc')]);
            session(['from'   => $this->request->input('from')]);
            session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
        }

		if(isset($_POST['submit'])){
			session(['catjobs'=> ($_POST['catjobs']!='choose')? $_POST['catjobs'] : null ]);
			session(['title'  => $_POST['title']]);
			session(['desc'   => $_POST['desc']]);
			session(['from'   => $_POST['from']]);
			session(['active' => ($_POST['active']=='active')? 1 :(($_POST['active']=='unactive')? 0 : null)]);
            $data['filter']['catjobs']= session('catjobs');
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
		$result['catjobs'] = $this->catjobsModel->getAll();
		$result['typejobs'] = $this->typejobsModel->getAll();
		$result['location'] = $this->locationModel->getAll();
        $result['positions'] = $this->systemModel->getAll('jobs_position');
		$result['jobs'] = $this->jobsModel->getData($data);
		foreach ($result['jobs'] as $key => $val) {
			$result['jobs'][$key]->title = $this->myFunction->trimText($result['jobs'][$key]->title,30);
			$result['jobs'][$key]->desc = $this->myFunction->trimText($result['jobs'][$key]->desc,50);
        }
		return view('Admin::Jobs.list',$result);
	}

    public function insertData()
    {
        $data['frm'] = array();
        $catjobs = $this->catjobsModel->getAll();
        $data['catjobs'] = array();
        foreach ($catjobs as $value){
            $data['catjobs'][$value->id] = $value->title;
        }

        $typejobs = $this->typejobsModel->getAll();
        $data['typejobs'] = array();
        foreach ($typejobs as $value){
            $data['typejobs'][$value->id] = $value->title;
        }

        $location = $this->locationModel->getAll();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('jobs_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catjobs' => 'required',
                'positions' => 'required',
                'typejobs'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required',
                'from' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);

            $frm =
                ['id'     	  => NULL,
                'catjobs'     => $this->request->input('catjobs'),
                'positions'   => $this->request->input('positions'),
                'typejobs'    => $this->request->input('typejobs'),
                'location'    => $this->request->input('location'),
                'title'       => $this->request->input('title'),
                'desc'        => $this->request->input('desc'),
                'content'     => $this->request->input('content'),
                'image'       => $_FILES["feature"]["name"],
                'salary'      => $this->request->input('salary'),
                'from'        => $this->request->input('from'),
                'active'      => $this->request->input('active')? 1 : 0,
                'date_create' => time(),
                'author'      => 1];

            if($this->request->input('submit_edit')){
                $id = $this->jobsModel->insertData($frm);
                return redirect('admin/jobs/edit?id='.$id);
            }else{
                $this->jobsModel->insertData($frm);
                return redirect('admin/jobs');
            }

        }elseif($this->request->get('id')){
            $id = $this->request->get('id');
            $jobs = $this->jobsModel->getbyId($id);
            $data['frm'] =
                ['catjobs'    => $jobs->catjobs,
                'positions'   => $jobs->positions,
                'typejobs'    => $jobs->typejobs,
                'location'    => $jobs->location,
                'title'       => $jobs->title,
                'desc'        => $jobs->desc,
                'content'     => $jobs->content,
                'image'       => $jobs->image,
                'salary'      => $jobs->salary,
                'from'        => $jobs->from,
                'active'      => $jobs->active,
                'author'      => 1];
        }

        return view('Admin::Jobs.insert',$data);
    }

    public function editData(){
        $id = $this->request->get('id');
        $data['edit'] = $id;

        $catjobs = $this->catjobsModel->getAll();
        $data['catjobs'] = array();
        foreach ($catjobs as $value){
            $data['catjobs'][$value->id] = $value->title;
        }

        $typejobs = $this->typejobsModel->getAll();
        $data['typejobs'] = array();
        foreach ($typejobs as $value){
            $data['typejobs'][$value->id] = $value->title;
        }

        $location = $this->locationModel->getAll();
        $data['location'] = array();
        foreach ($location as $value){
            $data['location'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('jobs_position');

        $jobs = $this->jobsModel->getbyId($id);
        if($this->request->input('submit') || $this->request->input('submit_edit')){
            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catjobs' => 'required',
                'positions' => 'required',
                'typejobs'    => 'required',
                'location'    => 'required',
                'content' => 'required',
                'desc' => 'required',
                'from' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
            }else{
                $_FILES["feature"]["name"] = $jobs->image;
            }

            $data['frm'] =
                ['catjobs'    => $this->request->input('catjobs'),
                'positions'   => $this->request->input('positions'),
                'typejobs'    => $this->request->input('typejobs'),
                'location'    => $this->request->input('location'),
                'title'       => $this->request->input('title'),
                'desc'        => $this->request->input('desc'),
                'content'     => $this->request->input('content'),
                'image'       => $_FILES["feature"]["name"],
                'salary'      => $this->request->input('salary'),
                'from'        => $this->request->input('from'),
                'active'      => $this->request->input('active')? 1 : 0,
                'date_update' => time(),
                'author'      => 1];

            if($this->request->input('submit_edit')){
                $this->jobsModel->updateData($data['frm'], $id);

                return view('Admin::jobs.insert',$data);
            }else{
                $this->jobsModel->updateData($data['frm'], $id);

                return redirect('admin/jobs');
            }
        }else{
            $data['frm'] =
                ['catjobs'    => $jobs->catjobs,
                'positions'   => $jobs->positions,
                'typejobs'    => $jobs->typejobs,
                'location'    => $jobs->location,
                'title'       => $jobs->title,
                'desc'        => $jobs->desc,
                'content'     => $jobs->content,
                'from'        => $jobs->from,
                'image'       => $jobs->image,
                'salary'      => $jobs->salary,
                'active'      => $jobs->active,
                'author'      => 1];

            return view('Admin::Jobs.insert',$data);
        }
    }

    public function deleteData()
    {
        if($this->request->get('id')){
            return $this->jobsModel->deteleId($this->request->get('id'));
        }
    }

    public function activeData()
    {
        $active = 0;
        if($this->request->get('check') == 'true'){
            $active = 1;
        }
        if($this->request->get('id')){
            return $this->jobsModel->activeId($active,$this->request->get('id'));
        }
    }

    public function applyData()
    {
        if($this->request->get('action')){
            switch ((int)$this->request->get('action')) {
                case 1:
                    foreach ($this->request->get('data') as $val) {
                        $this->jobsModel->activeId(1,$val);
                    }
                    break;
                case 2:
                    foreach ($this->request->get('data') as $val) {
                        $this->jobsModel->activeId(0,$val);
                    }
                    break;
                case 3:
                    foreach ($this->request->get('data') as $val) {
                        $this->jobsModel->deteleId($val);
                    }
                    break;
            }
        }
    }
}
