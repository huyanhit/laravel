<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Models\CommentModel;
class LibraryController extends Controller
{
    public function __construct()
    {
        $this->comment = new CommentModel();
    }
	public function insertComment(){
        $data = ['id'           => NULL,
                'name'     => $_POST['name'],
                'comment'    => $_POST['comment'],
                'date_create' => time(),
                'idnews' => $_POST['id'],
                'idcomment' => isset($_POST['idcomment'])?$_POST['idcomment']:0];
        $this->comment->insertComment($data);
        $html ='
        <div class="content clearfix">
            <div class="avata"><img src="http://localhost/laravel/public/images/background-new.jpg"></div>
            <div class="pendding">Cho duyet</div>
            <div class="extra">
                <span class="name"><strong>'.$_POST['name'].'</strong></span>
                <span class="date">Luc: '.date('d-m-Y',time()).'</span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 0 </span>
                <span class="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 0 </span>
            </div>
            <div class="desc">'.$_POST['comment'].'</div>
        </div>';
        print($html);
    }
    public function getComment($id){
    	
    }
}