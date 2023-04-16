<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    public function loadDSNhanVienView(){
        $nhanvien = User::where("LoaiTaiKhoan","E");
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
    public function capNhatThongTinNVien(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'LoaiTaiKhoan' => 'required',
            'HoTen' => 'nullable|string|max:255',
            'GioiTinh' => 'nullable|integer',
            'DiaChi' => 'nullable|string|max:255',
            'SDT' => 'nullable|string|max:20',
            'QuanHuyen' => 'nullable|string|max:255',
            'TinhThanh' => 'nullable|string|max:255',
            'ChiNhanh' => 'nullable|string|max:255',
            'NgaySinh' => 'nullable|date',
            'TrangThai' => 'required|integer',
            'MaGiaoDien' => 'nullable|string|max:255',
        ]);
        $nhanvien = User::findOrFail($id);
        $nhanvien->fill($validatedData);

        if ($request->password) {
            $nhanvien->password = Hash::make($request->password);
        }

        $nhanvien->save();
    }
    public function themNhanVien(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
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
        $nhanvien =  new User();
        $nhanvien->name = $request->name;
        $nhanvien->email = $request->email;
        $nhanvien->password = Hash::make($request->password);
        $nhanvien->LoaiTaiKhoan = "E";
        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->GioiTinh = $request->GioiTinh;
        $nhanvien->DiaChi = $request->DiaChi;
        $nhanvien->SDT = $request->SDT;
        $nhanvien->QuanHuyen = $request->QuanHuyen;
        $nhanvien->TinhThanh = $request->TinhThanh;
        $nhanvien->ChiNhanh = $request->ChiNhanh;
        $nhanvien->NgaySinh = $request->NgaySinh;
        $nhanvien->TrangThai = $request->TrangThai;
        $nhanvien->NguoiTao = $request->NguoiTao;
        $nhanvien->MaGiaoDien = $request->MaGiaoDien;
        $nhanvien->save();
        return redirect()->route("quanlyKH-view");
    }
    public function chiTietNhanVien($id){
        $nhanvien = User::find($id);
        return view('he-thong.danh-muc.nhan-vien.nhanvien-details',compact("nhanvien"));
    }
    public function xoaNhanVien($id){
        $nhanvien = User::find($id);
        $nhanvien->delete();
        return redirect()->route("quanlyKH-view");
    }

}
