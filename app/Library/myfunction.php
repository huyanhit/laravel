<?php 
/**
* 
*/
use App\Modules\ModuleOne\Models\TestModel;
namespace App\Library {
	class myFunction {
		function module_headerline(){
			return array(
				'title'=>'headerline',
				'image'=>'#'
			);
		}
	}
}
