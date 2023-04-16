<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function loadDSKhachHangView(){
        $khachhang = User::where('LoaiTaiKhoan','C')->get();
        return view('he-thong.danh-muc.khach-hang.ds-khachhang')->with('KhachHang',$khachhang);
    }


    public function themKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.them-khachhang');
    }

    public function themKhachHang(Request $request){
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
        return view('he-thong.danh-muc.khach-hang.khachhang-details',compact('khachhang'));
    }

}
