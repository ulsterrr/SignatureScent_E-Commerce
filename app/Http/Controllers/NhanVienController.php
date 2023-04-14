<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function loadDSNhanVienView(){

        return view('he-thong.danh-muc.nhan-vien.ds-nhanvien');
    }
    public function themNhanVienView(){
        return view('he-thong.danh-muc.nhan-vien.them-nhanvien');
    }

    public function chiTietNhanVienView(){
        return view('he-thong.danh-muc.nhan-vien.nhanvien-details');
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
