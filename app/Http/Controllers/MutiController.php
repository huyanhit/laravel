<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Models\MutiModel;

class MutiController extends Controller
{
    public function __construct()
    {
        $this->muti = new MutiModel();
    }
    public function content($id){
        $data['muti'] = $this->muti->getTypemutibyId($id);
        return view("mutimedia",$data);
    }
}
