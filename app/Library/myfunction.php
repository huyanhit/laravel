<?php 
namespace App\Library {
	class MyFunction {
		public function module_headerline(){
			return array(
				'title'=>'headerline',
				'image'=>'#'
			);
		}
		public function uploadImage($file){
			$target_dir = "public/uploads/";
			$target_file = $target_dir.basename($file["name"]);
			return move_uploaded_file($file["tmp_name"],$target_file);
		}	
	}
}
