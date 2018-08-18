<?php 

namespace App\Library {

	class MyFunction {

		public function uploadImage($file,$dir="images",$thumnail="thum_images"){

			$target_dir = UPLOAD_PATH;

			if(!empty($dir)){

				$target_dir = UPLOAD_PATH.$dir."/";

				if(!file_exists($target_dir)){

					mkdir($target_dir, 0777);

				}

			}

			$target_file = $target_dir.basename($file["name"]);

		  	$alow = array('jpg','png','JPG','PNG');

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

						$this->cropImage($target_file,1,1,$thumnail,800);

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

					mkdir($target_dir, 0777);

				}

			}

			if(!file_exists($target_dir)){

				mkdir($target_dir, 0777);

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

            if ($length != -1) {

                if (strlen($text) <= $length) {

                    return $text;

                }

                $last_space = strrpos(substr($text, 0, $length), ' ');

                $trimmed_text = substr($text, 0, $last_space);

                if ($ellipses) {

                    $trimmed_text .= '...';

                }
            }else{
                $trimmed_text = $text;
            }

		    return $trimmed_text;
		}

		

		public function cropImage($ini_filename, $xtl = 1, $ytl = 1, $save="thumb", $resize=0){


		    $target_dir = UPLOAD_PATH;

		  	$arrext = explode(".", $ini_filename);

		  	$ext = end($arrext);

		  	$arrpath = explode("/", $ini_filename);

		  	$path = end($arrpath);



		  	if($xtl != $ytl){

                $save = $save.'('.$xtl.'x'.$ytl.')';

                if(!file_exists($target_dir.$save)){

                    mkdir($target_dir.$save, 0777);

                }

            }elseif(!file_exists($target_dir.$save)){

				mkdir($target_dir.$save, 0777);

			}



			$newpath = $target_dir.$save.'/'.$path;

            $repath = url('/').'/public/uploads/'.$save.'/'.$path;

			if(!file_exists($newpath)){

				header('Content-Type: image/jpeg');

				if($ext == "gif"){ 

			    	$im = @imagecreatefromgif($ini_filename);

			  	} else if($ext =="png"){ 

			    	$im = @imagecreatefrompng($ini_filename);

			    } else if($ext =="jpg" || $ext =="jpeg" || $ext =="JPG" || $ext =="JPEG"){ 

			        $im = @imagecreatefromjpeg($ini_filename);

			    }else{

			    	return;

			    }

			    if (!$im) {

			    	return;

			    }

				$ini_x_size = getimagesize($ini_filename )[0] ;

				$ini_y_size = getimagesize($ini_filename )[1] ;

				$min_xtl = $ini_x_size/$xtl;

				$min_yht = $ini_y_size/$ytl;

				if($min_xtl < $min_yht){

					//$to_crop_array = array('x' =>0 , 'y' => (($ini_y_size-($ini_x_size/$xtl*$ytl))/2), 'width' => $ini_x_size,'height'=>($ini_x_size/$xtl*$ytl));
					//$thumb_im = imagecrop($im, $to_crop_array);
                    $dest = imagecreatetruecolor($ini_x_size, ($ini_x_size/$xtl*$ytl));
                    imagecopy($dest, $im, 0, 0, 0, (($ini_y_size-($ini_x_size/$xtl*$ytl))/2), $ini_x_size, ($ini_x_size/$xtl*$ytl));
                    $thumb_im = $dest;

				}else{

					//$to_crop_array = array('x' =>(($ini_x_size-($ini_y_size/$ytl*$xtl))/2) , 'y' => 0, 'width' => ($ini_y_size/$ytl*$xtl), 'height'=> $ini_y_size);
					//$thumb_im = imagecrop($im, $to_crop_array);
                    $dest = imagecreatetruecolor(($ini_y_size/$ytl*$xtl), $ini_y_size);
                    imagecopy($dest, $im, 0, 0, (($ini_x_size-($ini_y_size/$ytl*$xtl))/2), 0, ($ini_y_size/$ytl*$xtl), $ini_y_size);
                    $thumb_im = $dest;
                }

				imagejpeg($thumb_im, $newpath, 100);

				if($resize > 0){

					$this->resize($newpath, $resize,($resize/$xtl)*$ytl);

				}

			}

            return $repath;

		}



		public function resize($ini_filename ,$newwidth = 300, $newheight = 300) {

			header('Content-Type: image/jpeg');

			list($width, $height) = getimagesize($ini_filename);

			$thumb = imagecreatetruecolor($newwidth, $newheight);

			$source = imagecreatefromjpeg($ini_filename);

			imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			imagejpeg($thumb, $ini_filename , 100);

		}

        public function toSlug($str) {
            $str = trim(mb_strtolower($str));
            $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
            $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
            $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
            $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
            $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
            $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
            $str = preg_replace('/(đ)/', 'd', $str);
            $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
            $str = preg_replace('/([\s]+)/', '-', $str);
            return $str;
        }

	}

}

