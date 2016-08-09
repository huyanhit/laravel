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
        $this->myFunction = new MyFunction();
        $this->index();
    }
    
    public function index()
    {
        $data['news'] = $this->headerline->getAll();
        $data['news'][0]->title = $this->myFunction->trimText($data['news'][0]->title,50);
        $data['news'][0]->desc = $this->myFunction->trimText($data['news'][0]->desc,50);
        $this->myFunction->cropImage('./public/uploads/'.$data['news'][0]->image,1.5,1,'headerline');
        return view("home",$data);
    }
}
