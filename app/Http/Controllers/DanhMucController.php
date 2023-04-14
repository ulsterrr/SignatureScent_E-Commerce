<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function loadDSFeedback(){

        return view('he-thong.danh-muc.feedback.feedback');
    }

    public function loadDSChiNhanhView(){
        $chinhanh = ChiNhanh::all();
        return view('he-thong.danh-muc.chi-nhanh.ds-chinhanh')->with('ChiNhanh',$chinhanh);
    }
    public function themChiNhanhView(Request $req){
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

    public function chiTietChiNhanhView($id){
        $chinhanh = ChiNhanh::find($id);
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }

    public function loadDSKhachHangView(){
        $khachhang = User::where('LoaiTaiKhoan','C')->get();
        return view('he-thong.danh-muc.khach-hang.ds-khachhang');
    }
    public function themKhachHangView(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'LoaiTaiKhoan' => 'required',
            'HoTen' => 'required',
            'GioiTinh' => 'required',
            'DiaChi' => 'required',
            'SDT' => 'required',
            'QuanHuyen' => 'required',
            'TinhThanh' => 'required',
            'ChiNhanh' => 'required',
            'NgaySinh' => 'required',
            'TrangThai' => 'required',
            'NguoiTao' => 'required',
            'MaGiaoDien' => 'required',
        ]);
        $user =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->LoaiTaiKhoan = "C";
        $user->HoTen = $request->HoTen;
        $user->GioiTinh = $request->GioiTinh;
        $user->DiaChi = $request->DiaChi;
        $user->SDT = $request->SDT;
        $user->QuanHuyen = $request->QuanHuyen;
        $user->TinhThanh = $request->TinhThanh;
        $user->ChiNhanh = $request->ChiNhanh;
        $user->NgaySinh = $request->NgaySinh;
        $user->TrangThai = $request->TrangThai;
        $user->NguoiTao = $request->NguoiTao;
        // $user->MaGiaoDien = $request->MaGiaoDien;
        $user->save();
        return view('he-thong.danh-muc.khach-hang.them-khachhang');
    }

    public function chiTietKhachHangView($id){
        $khachhang = User::find($id);
        return view('he-thong.danh-muc.khach-hang.khachhang-details');
    }
}
