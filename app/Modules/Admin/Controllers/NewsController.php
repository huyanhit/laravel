<?php 
namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\NewsModel;

/**
 * NewsController
 *
 * Controller to house all the functionality directly
 * related to the Admin.
 */
class NewsController extends Controller
{
	function __construct( NewsModel $Newsmodel )
	{
		$this->newsModel = $Newsmodel;
	}

	public function index()
	{
		$data['news'] = $this->newsModel->getAll();
		return view('Admin::News.list',$data);
	}

	public function insertNews()
	{
		if(isset($_POST['submit'])){
			
			$frm[] = $_POST['title'];
			$frm[] = $_POST['desc'];
			$frm[] = $_POST['content'];
			$frm[] = $_POST['from'];
			$frm[] = isset($_POST['active'])?1:0;
			$frm[] = $_POST['typenews'];
			print_r($frm);

		}else{
			return view('Admin::News.insert');
		}
	}

	public function deleteNews()
	{
		if(isset($_GET['id'])){
			return $this->newsModel->deteleId($_GET['id']);
		}
	}

	public function activeNews()
	{
		$active = 0;
		if($_GET['check'] == 'true'){
			$active = 1;
		}
		if(isset($_GET['id'])){
			return $this->newsModel->activeId($active,$_GET['id']);
		}
	}
}
