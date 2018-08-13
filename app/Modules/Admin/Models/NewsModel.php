<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{

	function __construct() {
       $this->table = "news";
   	}

	public function getData($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table($this->table)
			->where('catnews', 'like', isset($data["filter"]["catnews"])?$data["filter"]["catnews"].'%':'%')
            ->where('positions', 'like', isset($data["filter"]["positions"])?$data["filter"]["positions"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
            ->where('active', 1)
			->paginate(10);
		}else{
			$result = DB::table($this->table)
			->where('catnews', 'like', isset($data["filter"]["catnews"])?$data["filter"]["catnews"].'%':'%')
            ->where('positions', 'like', isset($data["filter"]["positions"])?$data["filter"]["positions"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
            ->where('active', 1)
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM ".$this->table." WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table($this->table)
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertData($data)
	{	
		$result = DB::table($this->table)->insertGetId($data);
		return $result;
	}
	public function updateData($data,$id)
	{	
		$result = DB::table($this->table)->where('id',$id)->update($data);
		return $result;
	}
	public function getbyId($id){
		$result = DB::table($this->table)->where('id', $id)->where('active', 1)->first();
		return $result;
	}
	public function googleRss(){
		$xml=("http://news.google.com/news?ned=us&topic=h&output=rss");
		$xmlDoc = new \DOMDocument();
		$xmlDoc->load($xml);
		$x=$xmlDoc->getElementsByTagName('item');
		for ($i=0; $i<=10; $i++) {
		  $item_title=$x->item($i)->getElementsByTagName('title')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_link=$x->item($i)->getElementsByTagName('link')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_desc=$x->item($i)->getElementsByTagName('description')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_from = "Google";
		  $data = ['id'     	  => NULL,
			    'catnews'     => 1,
			    'title'       => strip_tags($item_title), 
			    'desc'        => strip_tags($item_desc), 
			    'content'     => strip_tags($item_desc),  
			    'from'        => $item_from, 
			    'active'      => 1,  
			    'date_create' => time(), 
			    'author'      => 1];
		  $this->insertData($data);
		}
	}
	public function importRss($data,$item_from="Not found"){
		$xml=($data);
		$xmlDoc = new \DOMDocument();
		$xmlDoc->load($xml);
		$x=$xmlDoc->getElementsByTagName('item');
		for ($i=0; $i<=$x->length; $i++) {
		  $item_title=$x->item($i)->getElementsByTagName('title')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_link=$x->item($i)->getElementsByTagName('link')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_desc=$x->item($i)->getElementsByTagName('description')
		  ->item(0)->childNodes->item(0)->nodeValue;
		  $item_image = $this->getImgSrc($item_desc);
		  $data = ['id'     	  => NULL,
			    'catnews'     => 1,
			    'title'       => strip_tags($item_title), 
			    'desc'        => strip_tags($item_desc), 
			    'content'     => strip_tags($item_link),  
			    'from'        => $item_from, 
			    'image'  	  => $item_image, 
			    'active'      => 1,  
			    'date_create' => time(), 
			    'author'      => 1];
		  $this->insertData($data);
		}
	}

	public function getImgSrc($cdata)
	{
	    preg_match_all('/<img[^>]+>/i',$cdata, $imgTags); 
		for ($i = 0; $i < count($imgTags[0]); $i++) {
		   preg_match('/src="([^"]+)/i',$imgTags[0][$i], $imgage);
		   $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
		}
		$newimage = str_replace("_180x108","",$origImageSrc[0]);
		$arrext = explode(".", $newimage);
	  	$ext = end($arrext);
	  	$arrpath = explode("/", $newimage);
		$path = end($arrpath);
	  	if($ext == "gif" || $ext =="png" || $ext =="jpeg" || $ext =="jpg"){ 
	  		if(!file_exists(UPLOAD_PATH.'rootrss/')){
				mkdir(UPLOAD_PATH.'rootrss/', 0700);
			}
	    	copy($newimage,UPLOAD_PATH.'rootrss/'.$path);
	  	}
	  	return $path;
	}
}