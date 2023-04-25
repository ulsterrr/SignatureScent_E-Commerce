<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class NhanVienController extends Controller
{
    public function loadDSNhanVienView(){
        $nhanvien = User::where([["LoaiTaiKhoan","E"],["TrangThai","1"]])->get();
        return view('he-thong.danh-muc.nhan-vien.ds-nhanvien')->with("NhanVien",$nhanvien);
    }
    public function themNhanVienView(){
        return view('he-thong.danh-muc.nhan-vien.them-nhanvien');
    }

    public function chiTietNhanVienView(){
        return view('he-thong.danh-muc.nhan-vien.nhanvien-details');
    }
    public function capNhatThongTinNVienView($id){
        $user = User::find($id);
        return view('he-thong.danh-muc.nhan-vien.capnhat-nhanvien',compact('user'));
    }

    public function capNhatThongTinNVien(Request $request,$id){
        $nhanvien = User::findOrFail($id);
        $nhanvien->email = $request->email;
        // $nhanvien->password = Hash::make($request->password);
        $nhanvien->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->GioiTinh = $request->GioiTinh;
        $nhanvien->DiaChi = $request->DiaChi;
        $nhanvien->SDT = $request->SDT;
        $nhanvien->QuanHuyen = $request->QuanHuyen;
        $nhanvien->TinhThanh = $request->TinhThanh;
        $nhanvien->MaGiaoDien = "1";
        $nhanvien->ChiNhanh = "";
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();
        $nhanvien->NgaySinh = $date_time;
        $nhanvien->TrangThai = $request->TrangThai;
        $nhanvien->NguoiTao = "";
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->updated_at = $dt;
        $nhanvien->save();
        session()->flash('message','Cập nhật tài khoản thành công!');




        return redirect()->route("quanly-thongtin-nv-view");
    }
    public function themNhanVien(Request $request){
        // dd($request->all());

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
        session()->flash('message','cập nhật tài khoản thành công!');

        return redirect()->route("quanly-thongtin-nv-view");
    }
    public function chiTietNhanVien($id){
        $nhanvien = User::find($id);
        return view('he-thong.danh-muc.nhan-vien.nhanvien-details',compact("nhanvien"));
    }
    public function xoaNhanVien($id){
        $nhanvien = User::find($id);
        $nhanvien->TrangThai = "0";
        $nhanvien->delete();
        $nhanvien->save();
        return redirect()->route("quanlyKH-view");
    }
    public function doiAnhDaiDien($id, Request $request)
    {

        $user = User::findOrFail($id);

        $avatarName = explode('@', $user->email)[0] . '_' . $user->id . '_avatar_' . time() . '.' . $request->file('AnhDaiDien')->getClientOriginalExtension();

        $request->file('AnhDaiDien')->storeAs('assets/images/faces', $avatarName);

        $user->AnhDaiDien = $avatarName;
        $user->save();

        return back()->with('success', 'Đổi hình đại diện thành công.');
    }

    public function layDsNVienModal(Request $request)
    {
        $users = User::select(['id', 'HoTen', 'email', 'SDT', 'AnhDaiDien', 'LoaiTaiKhoan']);

        return datatables()->of($users)->make(true);
    }

    public function layDsNvienAjax()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
    }
}
