<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use Hash;
use App\Library\myfunction;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
        $this->images = 'news';
        $this->thum_images = 'thum_news';
        $this->myFunction = new MyFunction();
    }

    public function register(Request $request){
        $user = $this->user->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => Hash::make($request->get('password'))
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'User created successfully',
            'data'=>$user
        ]);
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');
            $token = null;
            try {
               if (!$token = JWTAuth::attempt($credentials)) {
                   return response()->json(['invalid_email_or_password'], 422);
               }
            } catch (JWTAuthException $e) {
                return response()->json(['failed_to_create_token'], 500);
            }
            return response()->json(compact('token'));
        }
    }

    public function getUserInfo(Request $request){
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }

    public function updateUserInfo(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');

        $result = User::where('id', $id)
                    ->update([
                        'name' => $name,
                        'email' => $email
                    ]);
        if($result){
            return response()->json(["success"]);
        }else{
            return response()->json(["false"]);
        }
    }
    
    public function insertUserInfo(Request $request){
        $password = $request->input('password');
        $email = $request->input('email');

        $result = User::create([
                        'password' => $password,
                        'email' => $email
                    ]);
        if($result){
            return response()->json(["success"]);
        }else{
            return response()->json(["false"]);
        }
    }
    
    public function uploadUserInfo(Request $request){
        $file =  $request->file;
        if($file != null){
            $destinationPath = public_path('uploads');
            $fileName = $file->getClientOriginalName();
            if($file->move($destinationPath, $fileName)){
                $path = url('/');
                return response()->json([$path.'/public/uploads/'.$fileName]);
            }
        }
        return response()->json(["false"]);
    }
    

    public function postNews(Request $request){
        print_r($request->input());
    }

    public function getAllUser(Request $request){
        return response()->json(User::all());
    }
}