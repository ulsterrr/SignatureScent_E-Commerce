<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class TaiKhoanController extends Controller
{
    public function loadDSTaiKhoanView(){
        $user = User::all();
        return view('he-thong.danh-muc.tai-khoan.ds-user')->with('User',$user);

    }
    public function themTaiKhoanView(){
        return view('he-thong.danh-muc.tai-khoan.them-user');
    }
    public function themTaiKhoan(Request $request){

        // dd($request);
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'LoaiTaiKhoan' => 'required',
            'HoTen' => 'required',
            'GioiTinh' => 'required',
            'DiaChi' => 'required',
            'SDT' => 'required',
            'NgaySinh' => 'required',
            'TrangThai' => 'required',
        ]);
        $newuser =  new User();
        $newuser->name = $request->HoTen;
        $newuser->email = $request->email;
        $newuser->password = Hash::make($request->password);
        $newuser->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $newuser->HoTen = $request->HoTen;
        $newuser->GioiTinh = $request->GioiTinh;
        $newuser->DiaChi = $request->DiaChi;
        $newuser->SDT = $request->SDT;
        $newuser->QuanHuyen = $request->QuanHuyen;
        $newuser->TinhThanh = $request->TinhThanh;
        $newuser->MaGiaoDien = "1";
        $newuser->ChiNhanh = "";


        //convert chuỗi ngày sang kiểu dữ liệu ngày lưu vào db
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();

        $newuser->NgaySinh = $date_time;

        $newuser->TrangThai = $request->TrangThai;
        $newuser->NguoiTao = "";
        $newuser->save();
        session()->flash('message','Thêm tài khoản thành công!');

        return redirect()->route('quanlyTKView');


    }
    public function chiTietTaiKhoanView($id){
        $user = User::find($id);
        return view('he-thong.danh-muc.tai-khoan.user-details',compact('user'));

    }

    public function capNhatTaiKhoan(Request $request,$id){
        $user = User::findOrFail($id);
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $user->HoTen = $request->HoTen;
        $user->GioiTinh = $request->GioiTinh;
        $user->DiaChi = $request->DiaChi;
        $user->SDT = $request->SDT;
        $user->QuanHuyen = $request->QuanHuyen;
        $user->TinhThanh = $request->TinhThanh;
        $user->MaGiaoDien = "1";
        $user->ChiNhanh = "";
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();
        $user->NgaySinh = $date_time;
        $user->TrangThai = $request->TrangThai;
        $user->NguoiTao = "";
        $user->save();
        session()->flash('message','Cập nhật tài khoản thành công!');

        $user->save();
        return redirect()->route("quanlyTKView");

    }
    public function capNhatTaiKhoanView($id){
        $user = User::find($id);
        return view('he-thong.danh-muc.tai-khoan.capnhat-user',compact('user'));
    }
    public function xoaTaiKhoan($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route("quanlyTKView");
    }
}
