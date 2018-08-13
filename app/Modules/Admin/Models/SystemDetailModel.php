<?php
namespace App\Modules\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class SystemDetailModel extends Model
{
    public function __construct()
    {

    }

    public function getSystemCodeDetail($system_code_column, $system_code_detail_column)
    {
        $result = DB::table('system_code')
            ->join('system_code_detail', 'system_code_detail.system_code_id', '=', 'system_code.id')
            ->where('system_code.active',1)
            ->where('system_code_detail.active',1)
            ->where('system_code.column',$system_code_column)
            ->where('system_code_detail.column',$system_code_detail_column)
            ->first();

        return $result;
    }
}
