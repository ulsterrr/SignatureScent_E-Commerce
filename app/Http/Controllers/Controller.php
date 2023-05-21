<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function taoMaKhoaChinh($prefix){
        DB::select('CALL sp_KhoiTaoKyHieu(?, @p_code)', [$prefix]);
        $code = DB::select('SELECT @p_code AS code')[0]->code;
        return $code;
    }
}
