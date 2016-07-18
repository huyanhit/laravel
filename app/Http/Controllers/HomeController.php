<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->index();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $myFunction = new myFunction;
        $myFunction->module_headerline();
        $data['name'] = 'huy';
        $data['age'] = '28';
        $data['headerline']= $myFunction->module_headerline();
        return view("home",$data);
    }
}
