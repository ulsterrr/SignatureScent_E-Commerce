<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function thongTinSanPhamView() {
        return view('nguoi-dung.xem-sanpham');
    }

    public function cuaHangView() {
        return view('nguoi-dung.cua-hang');
    }

    public function gioiThieuView() {
        return view('nguoi-dung.gioi-thieu');
    }

    public function lienHeView() {
        return view('nguoi-dung.lien-he');
    }

    public function tinTucView() {
        return view('nguoi-dung.tin-tuc');
    }

    public function xemTinTucView() {
        return view('nguoi-dung.xem-tintuc');
    }
}
