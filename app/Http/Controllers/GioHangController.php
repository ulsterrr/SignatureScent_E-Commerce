<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function loadGioHangView(){
        return view('nguoi-dung.gio-hang');
    }
    public function loadChiTietGioHang(){

    }
}
