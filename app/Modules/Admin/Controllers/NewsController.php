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
		return view('Admin::Admin.list',$data);
	}

	public function insertNews()
	{
		return view('Admin::insert');
	}
}
