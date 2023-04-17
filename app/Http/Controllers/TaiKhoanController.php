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
        $newuser->ChiNhanh = $request->ChiNhanh;

        //convert chuỗi ngày sang kiểu dữ liệu ngày lưu vào db
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();

        $newuser->NgaySinh = $date_time;

        $newuser->TrangThai = $request->TrangThai;
        $newuser->NguoiTao = $request->NguoiTao;
        $newuser->save();
        session()->flash('message','Thêm tài khoản thành công!');

        return redirect()->route('quanlyTKView');


    }
    public function chiTietTaiKhoanView($id){
        $user = User::find($id);
        return view('he-thong.danh-muc.tai-khoan.user-details',compact('user'));

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
