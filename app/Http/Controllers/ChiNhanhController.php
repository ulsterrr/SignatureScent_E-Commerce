<?php

namespace App\Http\Controllers;
use App\Models\ChiNhanh;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ChiNhanhController extends Controller
{
    public function loadDSChiNhanhView(){
        $chinhanh = ChiNhanh::all();
        return view('he-thong.danh-muc.chi-nhanh.ds-chinhanh')->with('ChiNhanh',$chinhanh);
    }
    public function themChiNhanh(Request $req){
        $chinhanh = new ChiNhanh();

        $chinhanh->TenChiNhanh = $req->TenChiNhanh;
        $chinhanh-> DiaChi = $req->DiaChi;
        $chinhanh->TinhThanh = $req->TinhThanh;
        $chinhanh->QuanHuyen = $req->QuanHuyen;
        $chinhanh->SDT1 = $req->SDT1;
        $chinhanh->SDT2 = $req->SDT2;
        $chinhanh->SDT3 = $req->SDT3;
        $chinhanh->FAX = $req->FAX;
        $chinhanh->SoTaiKhoan = $req->SoTaiKhoan;
        $chinhanh->MoMo = $req->MoMo;
        $chinhanh->NguoiQuanLy = $req->NguoiQuanLy;
        $chinhanh->save();
        return view('he-thong.danh-muc.chi-nhanh.them-chinhanh');
    }
    public function themChiNhanhView(){

        return view('he-thong.danh-muc.chi-nhanh.them-chinhanh');
    }
    public function chiTietChiNhanhView(){
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }
    public function chiTietChiNhanh($id){
        $chinhanh = ChiNhanh::find($id);
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }
}
