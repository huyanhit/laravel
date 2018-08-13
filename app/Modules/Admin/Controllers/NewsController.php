<?php 
namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\NewsModel;
use App\Modules\Admin\Models\CatnewsModel;
use App\Modules\Admin\Models\SystemModel;
use App\Library\MyFunction;

/**
 * NewsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class NewsController extends Controller
{
	function __construct(Request $request)
	{
	    $this->images       = 'news';
        $this->thum_images  = 'thum_news';
        $this->request      = $request;
		$this->newsModel    = new NewsModel();
		$this->catnewsModel = new CatnewsModel();
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
			session(['catnews'=> ($this->request->input('catnews') != 'choose')? $this->request->input('catnews') : null ]);
            session(['positions'=> ($this->request->input('positions') != 'choose')? $this->request->input('positions') : null ]);
            session(['title'  => $this->request->input('title')]);
			session(['desc'   => $this->request->input('desc')]);
			session(['from'   => $this->request->input('from')]);
			session(['active' => ($this->request->input('active')=='active')? 1 :(($this->request->input('active')=='unactive')? 0 : null)]);
            $data['filter']['catnews']= session('catnews');
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

		$result['catnews'] = $this->catnewsModel->getAll();
        $result['positions'] = $this->systemModel->getAll('news_position');
		$result['news'] = $this->newsModel->getData($data);

		foreach ($result['news'] as $key => $val) {
			$result['news'][$key]->title = $this->myFunction->trimText($result['news'][$key]->title,30);
			$result['news'][$key]->desc = $this->myFunction->trimText($result['news'][$key]->desc,50);
        }

        return view('Admin::News.list',$result);
	}

	public function insertData()
	{
		$data['frm'] = array();
        $catnews = $this->catnewsModel->getAll();
        $data['catnews'] = array();
        foreach ($catnews as $value){
            $data['catnews'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('news_position');

        if($this->request->input('submit') || $this->request->input('submit_edit')){

            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catnews' => 'required',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required',
                'from' => 'required'
            ));

            if(!empty($_FILES["feature"]["name"]))
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);

            $frm =
                ['id'     	  => NULL,
                'catnews'     => $this->request->input('catnews'),
                'positions'   => $this->request->input('positions'),
                'title'       => $this->request->input('title'),
                'desc'        => $this->request->input('desc'),
                'content'     => $this->request->input('content'),
                'image'       => $_FILES["feature"]["name"],
                'from'        => $this->request->input('from'),
                'active'      => $this->request->input('active')? 1 : 0,
                'date_create' => time(),
                'author'      => 1];

            if($this->request->input('submit_edit')){
                $id = $this->newsModel->insertData($frm);
                return redirect('admin/news/edit?id='.$id);
            }else{
                $this->newsModel->insertData($frm);
                return redirect('admin/news');
            }

        }elseif($this->request->get('id')){
            $id = $this->request->get('id');
            $news = $this->newsModel->getbyId($id);
            $data['frm'] =
            ['catnews'    => $news->catnews,
            'positions'   => $news->positions,
            'title'       => $news->title,
            'desc'        => $news->desc,
            'content'     => $news->content,
            'image'       => $news->image,
            'from'        => $news->from,
            'active'      => $news->active,
            'author'      => 1];
        }

        return view('Admin::News.insert',$data);
	}
	
	public function editData(){
        $id = $this->request->get('id');
        $data['edit'] = $id;

        $catnews = $this->catnewsModel->getAll();
        $data['catnews'] = array();
        foreach ($catnews as $value){
            $data['catnews'][$value->id] = $value->title;
        }

        $data['positions']      = $this->systemModel->getList('news_position');

        $news = $this->newsModel->getbyId($id);
		if($this->request->input('submit') || $this->request->input('submit_edit')){
            $this->validate($this->request, array(
                'title' => 'required|max:255',
                'catnews' => 'required',
                'positions' => 'required',
                'content' => 'required',
                'desc' => 'required',
                'from' => 'required'
            ));

		    if(!empty($_FILES["feature"]["name"])){
                $_FILES["feature"]["name"] = $this->myFunction->uploadImage($_FILES["feature"], $this->images, $this->thum_images);
            }else{
                $_FILES["feature"]["name"] = $news->image;
            }

            $data['frm'] =
			   ['catnews'     => $this->request->input('catnews'),
                'positions'   => $this->request->input('positions'),
			    'title'       => $this->request->input('title'),
			    'desc'        => $this->request->input('desc'),
			    'content'     => $this->request->input('content'),
			    'image'       => $_FILES["feature"]["name"],
			    'from'        => $this->request->input('from'),
			    'active'      => $this->request->input('active')? 1 : 0,
			    'date_update' => time(),
			    'author'      => 1];

			if($this->request->input('submit_edit')){
				$this->newsModel->updateData($data['frm'], $id);

				return view('Admin::News.insert',$data);
			}else{
				$this->newsModel->updateData($data['frm'], $id);

				return redirect('admin/news');
			}
		}else{
            $data['frm'] =
                ['catnews'     => $news->catnews,
                'positions'   => $news->positions,
                'title'       => $news->title,
                'desc'        => $news->desc,
                'content'     => $news->content,
                'from'        => $news->from,
                'image'       => $news->image,
                'active'      => $news->active,
                'author'      => 1];

			return view('Admin::News.insert',$data);
		}
	}

	public function deleteData()
	{
		if($this->request->get('id')){
			return $this->newsModel->deteleId($this->request->get('id'));
		}
	}

	public function activeData()
	{
		$active = 0;
		if($this->request->get('check') == 'true'){
			$active = 1;
		}
		if($this->request->get('id')){
			return $this->newsModel->activeId($active,$this->request->get('id'));
		}
	}

	public function applyData()
	{
		if($this->request->get('action')){
			switch ((int)$this->request->get('action')) {
				case 1:
					foreach ($this->request->get('data') as $val) {
						$this->newsModel->activeId(1,$val);		
					}
				break;
				case 2:
					foreach ($this->request->get('data') as $val) {
						$this->newsModel->activeId(0,$val);		
					}
				break;
				case 3:
					foreach ($this->request->get('data') as $val) {
						$this->newsModel->deteleId($val);		
					}
				break;
			}
		}
	}

	public function updateRss()
	{
		$this->newsModel->importRss('http://vnexpress.net/rss/tin-moi-nhat.rss','VnExpress');
	}
}
