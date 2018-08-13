<?php 
namespace App\Http\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class SystemModel extends Model
{
    public function __construct()
    {

    }

    public function getListSystemCodelByName($system_code_column)
    {
        $list_data = array();
        $result = DB::table('system_code')
            ->join('system_code_detail', 'system_code_detail.system_code_id', '=', 'system_code.id')
            ->where('system_code.active',1)
            ->where('system_code_detail.active',1)
            ->where('system_code.column',$system_code_column)
            ->get();

        foreach ($result as $value){
            $list_data[$value->column] = $value->code;
        }

        return $list_data;
    }
}
