<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class TaiKhoanController extends Controller
{
    public function loadDSTaiKhoanView(){
        $user = User::all();
        return view('he-thong.danh-muc.tai-khoan.ds-user')->with('User',$user);

    }
    public function themTaiKhoanView(Request $request){

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
        $user->LoaiTaiKhoan = $request->LoaiTaiKhoan;
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
        $user->MaGiaoDien = $request->MaGiaoDien;
        $user->save();
        return view('he-thong.danh-muc.tai-khoan.them-user');

    }

    public function chiTietTaiKhoanView($id){

        return view('he-thong.danh-muc.tai-khoan.user-details');
        $user = User::find($id);
    }

    public function capNhatTaiKhoan(Request $request,$id){
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

        $user = User::findOrFail($id);
        $user->fill($validatedData);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
    }
    public function xoaTaiKhoan($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route("quanlyTKView");
    }
}
