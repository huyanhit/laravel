<?php 
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
	public function getAll($data)
	{
		if(!empty($data['sort'])){
			$result = DB::table('news')
			->where('catnews', 'like', isset($data["filter"]["catnews"])?$data["filter"]["catnews"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->orderby($data['sort']['order'], $data['sort']['by'])
			->paginate(10);
		}else{
			$result = DB::table('news')
			->where('catnews', 'like', isset($data["filter"]["catnews"])?$data["filter"]["catnews"].'%':'%')
			->where('title', 'like', isset($data["filter"]["title"])?$data["filter"]["title"].'%':"%")
			->where('desc', 'like', isset($data["filter"]["desc"])?$data["filter"]["desc"].'%':"%")
			->where('from', 'like', isset($data["filter"]["from"])?$data["filter"]["from"].'%':"%")
			->where('active', 'like', isset($data["filter"]["active"])?$data["filter"]["active"]:'%')
			->paginate(10);
		}
		return $result;
	}
	public function deteleId($id)
	{
		$result = DB::delete("DELETE FROM news WHERE id = ?",[$id]);
		return $result;
	}
	public function activeId($active,$id)
	{
		$result = DB::table('news')
            ->where('id', $id)
            ->update(['active' => $active]);
		return $result;
	}
	public function insertNews($data)
	{	
		$result = DB::table('news')->insertGetId($data);
		return $result;
	}
	public function updateNews($data,$id)
	{	
		$result = DB::table('news')->where('id',$id)->update($data);
		return $result;
	}
	public function getnewsbyId($id){
		$result = DB::table('news')->where('id', $id)->first();
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
		  $this->insertNews($data);
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
		  $this->insertNews($data);
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
	  		if(!file_exists('./public/uploads/rootrss/')){
				mkdir('public/uploads/rootrss/', 0700);
			}
	    	copy($newimage,'./public/uploads/rootrss/'.$path);
	  	}
	  	return $path;
	}
}