<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\PostjobsModel;
class PostjobsController extends BaseController
{
	public function __construct()
    {
        $this->postjobs = new PostjobsModel();
        $this->myFunction = new MyFunction();
        $this->index();
    }
	public function index(){
		$data['catjobs'] = $this->postjobs->getCatjobs();
		return view("postjobs",$data);
	}
}