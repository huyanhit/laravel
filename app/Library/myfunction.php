<?php 
namespace App\Library {
	class MyFunction {
		public function uploadImage($file){
			$target_dir = "public/uploads/";
			$target_file = $target_dir.basename($file["name"]);
			move_uploaded_file($file["tmp_name"],$target_file);
			$this->cropImage($target_file);
		}

		public function trimText($text, $length, $ellipses = true, $strip_html = true) {
		    if ($strip_html) {
		        $text = strip_tags($text);
		    }
		    if (strlen($text) <= $length) {
		        return $text;
		    }
		    $last_space = strrpos(substr($text, 0, $length), ' ');
		    $trimmed_text = substr($text, 0, $last_space);
		  	if ($ellipses) {
		        $trimmed_text .= '...';
		    }
		    return $trimmed_text;
		}
		
		public function cropImage($ini_filename, $xtl = 1, $ytl = 1, $save="thumb",$resize=0){
		  	$arrext = explode(".", $ini_filename);
		  	$ext = end($arrext);
		  	$arrpath = explode("/", $ini_filename);
		  	$path = end($arrpath);
		  	if($ext == "gif"){ 
		    	$im = imagecreatefromgif($ini_filename);
		  	} else if($ext =="png"){ 
		    	$im = imagecreatefrompng($ini_filename);
		    } else { 
		        $im = imagecreatefromjpeg($ini_filename);
		    }
			$ini_x_size = getimagesize($ini_filename )[0];
			$ini_y_size = getimagesize($ini_filename )[1];
			$min_xtl = $ini_x_size/$xtl;
			$min_yht = $ini_y_size/$ytl;
			if($min_xtl < $min_yht){
				$crop_measure = min($ini_x_size, $ini_y_size);
				$to_crop_array = array('x' =>0 , 'y' => (($ini_y_size-($ini_x_size/$xtl*$ytl))/2), 'width' => $ini_x_size, 'height'=>($ini_x_size/$xtl*$ytl));
				$thumb_im = imagecrop($im, $to_crop_array);
			}else{
				$crop_measure = min($ini_x_size, $ini_y_size);
				$to_crop_array = array('x' =>(($ini_x_size-($ini_y_size/$ytl*$xtl))/2) , 'y' => 0, 'width' => ($ini_y_size/$ytl*$xtl), 'height'=> $ini_y_size);
				$thumb_im = imagecrop($im, $to_crop_array);
			}
			if(!file_exists('public/uploads/'.$save)){
				mkdir('public/uploads/'.$save, 0700);
			}
			$newpath = 'public/uploads/'.$save.'/'.$path;
			imagejpeg($thumb_im, $newpath , 100);
			if($resize > 0){
				$this->resize($newpath, $resize,($resize/$xtl)*$ytl);
			}
		}

		public function resize($ini_filename ,$newwidth = 300, $newheight = 300) {
			header('Content-Type: image/jpeg');
			list($width, $height) = getimagesize($ini_filename);
			$thumb = imagecreatetruecolor($newwidth, $newheight);
			$source = imagecreatefromjpeg($ini_filename);
			imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
			imagejpeg($thumb, $ini_filename , 100);
		}
	}
}
