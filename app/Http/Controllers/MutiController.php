<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
class MutiController extends Controller
{
    public function __construct()
    {
       
    }
    public function index(){
        $data = array();
        return view("mutimedia",$data);
    }
}
