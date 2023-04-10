<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function loadDSTaiKhoanView(){
        return view('he-thong.danh-muc.tai-khoan.ds-user');
    }
    public function themTaiKhoanView(){
        return view('he-thong.danh-muc.tai-khoan.them-user');
    }

    public function chiTietTaiKhoanView(){
        return view('he-thong.danh-muc.tai-khoan.user-details');
    }
    public function loadDSTaiKhoan(){

    }
    public function themTaiKhoan(){

    }
    public function capNhatTaiKhoan(){

    }
    public function xoaTaiKhoan(){

    }
}
