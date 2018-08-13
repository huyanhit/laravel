<?php 
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
	function __construct(Request $request)
	{
        $this->request      = $request;
		$this->catnewsModel = new CatnewsModel();
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
			session(['title'  => $this->request->input('title')]);
			session(['icon'  => $this->request->input('icon')]);
			session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
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
		$data['frm'] = array();
		if($this->request->input('submit')|| $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255'
            ));

			$frm =  
			    ['id'     	  => NULL,
			    'title'       => $this->request->input('title'),
			    'icon'        => $this->request->input('icon'),
			    'active'      => $this->request->input('active')? 1 : 0];
			if($this->request->input('submit_edit')){
				$id = $this->catnewsModel->insertData($frm);
				return redirect('admin/catnews/edit?id='.$id);
			}else{
				$this->catnewsModel->insertData($frm);
				return redirect('admin/catnews');
			}

		}elseif($this->request->get('id')){
            $id = $this->request->get('id');
            $catnews = $this->catnewsModel->getbyId($id);
            $data['frm'] =
            ['title'       => $catnews->title,
            'icon'        => $catnews->icon,
            'active'      => $catnews->active];
        }

        return view('Admin::Catnews.insert',$data);
	}
	
	public function editData(){
		$id = $this->request->get('id');
        $data['edit'] = $id;

		if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255'
            ));

			$frm =  
			   ['title'       => $this->request->input('title'),
			    'icon'        => $this->request->input('icon'),
			    'active'      => $this->request->input('active')? 1 : 0,
			    ];
			$data['frm'] = $frm;
			if($this->request->input('submit_edit')){
				$this->catnewsModel->updateData($frm,$id);
				return view('Admin::Catnews.insert',$data);
			}else{
				$this->catnewsModel->updateData($frm,$id);
				return redirect('admin/catnews');
			}
		}else{
            $catnews = $this->catnewsModel->getbyId($id);
            $data['frm'] =
                ['title'       => $catnews->title,
                'icon'        => $catnews->icon,
                'active'      => $catnews->active];
			return view('Admin::Catnews.insert',$data);
		}
	}

	public function deleteData()
	{
		if($this->request->get('id')){
			return $this->catnewsModel->deteleId($this->request->get('id'));
		}
	}

	public function activeData()
	{
		$active = 0;
		if($this->request->get('check') == 'true'){
			$active = 1;
		}
		if($this->request->get('id')){
			return $this->catnewsModel->activeId($active,$this->request->get('id'));
		}
	}

	public function applyData()
	{
		if($this->request->input('action')){
			switch ((int)$this->request->input('action')) {
				case 1:
					foreach ($this->request->input('data') as $val) {
						$this->catnewsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($this->request->input('data') as $val) {
						$this->catnewsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($this->request->input('data') as $val) {
						$this->catnewsModel->deteleId($val);		
					}
				break;
			}
		}
	}
}
