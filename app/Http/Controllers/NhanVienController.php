<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function loadDSNhanVienView(){
        return view('he-thong.danh-muc.tai-khoan.ds-nhanvien');
    }
    public function themNhanVienView(){
        return view('he-thong.danh-muc.tai-khoan.them-nhanvien');
    }

    public function chiTietNhanVienView(){
        return view('he-thong.danh-muc.tai-khoan.nhanvien-details');
    }
    public function loadDSNhanVien(){

    }
    public function capNhatThongTinNVien(){

    }
    public function themNhanVien(){

    }
    public function xoaNhanVien(){

    }
}
