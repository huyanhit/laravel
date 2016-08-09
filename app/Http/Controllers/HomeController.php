<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->index();
    }
    
    public function index()
    {
        $myFunction = new myFunction;
        $data[] = array();
        return view("home",$data);
    }
}
