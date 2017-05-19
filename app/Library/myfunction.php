<?php 
namespace App\Library {
	class MyFunction {
		public function uploadImage($file,$dir="image"){
			$target_dir = UPLOAD_PATH;
			if(!empty($dir)){
				$target_dir = UPLOAD_PATH.$dir."/";
				if(!file_exists($target_dir)){
					mkdir($target_dir, 0700);
				}
			}
			$target_file = $target_dir.basename($file["name"]);
		  	$alow = array('jpg','png');
		  	$name = pathinfo($file["name"], PATHINFO_FILENAME);
			$ext = pathinfo($file["name"], PATHINFO_EXTENSION);
			$run = 1;
		  	if(in_array($ext,$alow))
		  	{
		  		while(true){
		  			if(file_exists($target_file)){
		  				$target_file = $target_dir.$name.$run.'.'.$ext;
		  				$file["name"] = $name.$run.'.'.$ext;
			  		}else{
						move_uploaded_file($file["tmp_name"],$target_file);
						$this->cropImage($target_file,1,1,'thumb',100);
						return $file["name"];
						break;
			  		}
			  		$run++;
		  		}
		  	}else{
		  		return false;
		  	}
		}

		public function uploadFile($file,$dir = "file"){
			$target_dir = UPLOAD_PATH;
			if(!empty($dir)){
				$target_dir = "public/uploads/".$dir."/";
				if(!file_exists($target_dir)){
					mkdir($target_dir, 0700);
				}
			}
			if(!file_exists($target_dir)){
				mkdir($target_dir, 0700);
			}
			$target_file = $target_dir.basename($file["name"]);
		  	$name = pathinfo($file["name"], PATHINFO_FILENAME);
			$ext = pathinfo($file["name"], PATHINFO_EXTENSION);
			$run = 1;
		  	while(true){
	  			if(file_exists($target_file)){
	  				$target_file = $target_dir.$name.$run.'.'.$ext;
	  				$file["name"] = $name.$run.'.'.$ext;
		  		}else{
					move_uploaded_file($file["tmp_name"],$target_file);
					return $file["name"];
					break;
		  		}
		  		$run++;
	  		}
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
			$target_dir = UPLOAD_PATH;
		  	$arrext = explode(".", $ini_filename);
		  	$ext = end($arrext);
		  	$arrpath = explode("/", $ini_filename);
		  	$path = end($arrpath);
			if(!file_exists($target_dir.$save)){
				mkdir($target_dir.$save, 0700);
			}
			$newpath = $target_dir.$save.'/'.$path;
			if(!file_exists($newpath)){
				header('Content-Type: image/jpeg');
				if($ext == "gif"){ 
			    	$im = @imagecreatefromgif($ini_filename);
			  	} else if($ext =="png"){ 
			    	$im = @imagecreatefrompng($ini_filename);
			    } else if($ext =="jpg" || $ext =="jpeg"){ 
			        $im = @imagecreatefromjpeg($ini_filename);
			    }else{
			    	return false;
			    }
			    if (!$im) {
			    	return;
			    }
				$ini_x_size = getimagesize($ini_filename )[0] ;
				$ini_y_size = getimagesize($ini_filename )[1] ;
				$min_xtl = $ini_x_size/$xtl;
				$min_yht = $ini_y_size/$ytl;
				if($min_xtl < $min_yht){
					$crop_measure = min($ini_x_size, $ini_y_size);
					$to_crop_array = array('x' =>0 , 'y' => (($ini_y_size-($ini_x_size/$xtl*$ytl))/2), 'width' => $ini_x_size,'height'=>($ini_x_size/$xtl*$ytl));
					$thumb_im = imagecrop($im, $to_crop_array);
				}else{
					$crop_measure = min($ini_x_size, $ini_y_size);
					$to_crop_array = array('x' =>(($ini_x_size-($ini_y_size/$ytl*$xtl))/2) , 'y' => 0, 'width' => ($ini_y_size/$ytl*$xtl), 'height'=> $ini_y_size);
					$thumb_im = imagecrop($im, $to_crop_array);
				}
				imagejpeg($thumb_im, $newpath , 100);
				if($resize > 0){
					$this->resize($newpath, $resize,($resize/$xtl)*$ytl);
				}
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
