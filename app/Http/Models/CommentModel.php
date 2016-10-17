<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Library\myfunction;


class CommentModel extends Model
{
	public function getCommentByID($typeid,$id)
	{
		$result = DB::table('comment')->where($typeid,$id)->where('idcomment',0)->orderby('id','asc')->get();
		foreach ($result as $key => $val) {
			$result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
			$result[$key]->child = array();
			$this->getCommentByIdComment($val->id,$result[$key]->child);
		}
		return $result;
    }
    public function insertComment($data)
	{	
		$result = DB::table('comment')->insertGetId($data);
		return $result;
	}
	private function getCommentByIdComment($id,&$result)
	{
		$result = DB::table('comment')->where('idcomment',$id)->get();
		foreach ($result as $key => $val) {
			$result[$key]->date_create = date('d-m-Y',$result[$key]->date_create);
			$result[$key]->child = array();
			$this->getCommentByIdComment($val->id,$result[$key]->child);
		}
    }
}