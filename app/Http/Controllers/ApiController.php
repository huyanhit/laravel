<?php
namespace App\Http\Controllers;
use App\Library\JWT;
use Illuminate\Http\Request;
use App\Http\Models\User;
use DB;

class ApiController extends Controller
{
    private $key = "123456";
    public function __construct(Request $request) {
        $this->index();
        $this->request = $request;
    }

    public function index(){
        $this->login();
    }

    public function login(){
        // $username = $this->request->input('username');
        // $password = $this->request->input('password');
        $username = "xulanh@xulanh.com";
        $password = "123456";

        $payload = DB::table('users')->where('email',$username )->where('password',  bcrypt($password))->first();
        print_r($payload);
        die;
        echo(JWT::encode($payload, $this->key));
    }
}