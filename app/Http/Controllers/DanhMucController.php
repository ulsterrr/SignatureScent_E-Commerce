<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DanhMucController extends Controller
{



    public function loadDSKhachHang(){

    }
    public function loadDSChiNhanh(){

    }

    public function loadDSFeedback(){

    }

    public function loadDSChiNhanhView(){
        return view('he-thong.danh-muc.tai-khoan.ds-chinhanh');
    }
    public function themChiNhanhView(){
        return view('he-thong.danh-muc.tai-khoan.them-chinhanh');
    }

    public function chiTietChiNhanhView(){
        return view('he-thong.danh-muc.tai-khoan.chinhanh-details');
    }

    public function loadDSKhachHangView(){
        return view('he-thong.danh-muc.tai-khoan.ds-khachhang');
    }
    public function themKhachHangView(){
        return view('he-thong.danh-muc.tai-khoan.them-khachhang');
    }

    public function chiTietKhachHangView(){
        return view('he-thong.danh-muc.tai-khoan.khachhang-details');
    }
}
