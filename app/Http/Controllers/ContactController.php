<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
class ContactController extends BaseController
{
	public function contact(){
		$data['name'] = 'huy';
		$data['age'] = '28';
		$data['data'] = array('name'=>'huy anh','age'=>'28');
		DB::transaction(function () {
		    DB::table('users')->update(['username' => 'huy']);
		    DB::table('users')->update(['active' => 0]);
		});
		$results = DB::select('select * from users');
		
		print_r($results);
		return view("pages.contact",$data);
	}
}