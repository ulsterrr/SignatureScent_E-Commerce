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
        return view('he-thong.danh-muc.feedback.feedback');
    }

    public function loadDSChiNhanhView(){
        return view('he-thong.danh-muc.chi-nhanh.ds-chinhanh');
    }
    public function themChiNhanhView(){
        return view('he-thong.danh-muc.chi-nhanh.them-chinhanh');
    }

    public function chiTietChiNhanhView(){
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }

    public function loadDSKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.ds-khachhang');
    }
    public function themKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.them-khachhang');
    }

    public function chiTietKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.khachhang-details');
    }
}
