<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Library\myfunction;
use App\Http\Models\HeaderlineModel;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->headerline = new HeaderlineModel();
        $this->index();
    }
    
    public function index()
    {
        $data = $this->headerline->getAll();
        return view("home",$data);
    }
}
