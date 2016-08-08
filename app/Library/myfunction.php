<?php 
namespace App\Library {
	class MyFunction {
		public function uploadImage($file,$xtl = 1,$ytl = 1){
			$target_dir = "public/uploads/";
			$target_file = $target_dir.basename($file["name"]);
			move_uploaded_file($file["tmp_name"],$target_file);
			$this->crop_image($target_file,$xtl,$ytl);
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
		
		public function crop_image($ini_filename,$xtl,$ytl){
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
			if(!file_exists('public/uploads/thumb')) 
				mkdir("public/uploads/thumb", 0700);
			imagejpeg($thumb_im, 'public/uploads/thumb/'.$path, 100);
		}
	}
}
