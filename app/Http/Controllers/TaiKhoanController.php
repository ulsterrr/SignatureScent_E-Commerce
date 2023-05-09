<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class TaiKhoanController extends Controller
{
    public function loadDSTaiKhoanView(){
        $user = User::where("TrangThai","1")->get();
        //return view('he-thong.danh-muc.tai-khoan.ds-user')->with('User',$user);
        //$user = User::all();
        //return view('he-thong.danh-muc.tai-khoan.ds-user')->with('User',$user);
        return view('he-thong.danh-muc.tai-khoan.ds-user');

    }
    public function themTaiKhoanView(){
        return view('he-thong.danh-muc.tai-khoan.them-user');
    }
    public function themTaiKhoan(Request $request){

        // $request->validate([
        // 'email' => 'required|email|unique:users',
        // 'password' => 'required|min:6|max:30',
        // 'SDT' => 'numeric',
        // ],
        // [
        // 'email.required'=>'Email ko dc de trong',
        // 'email.email' => 'Định dạng phải là email',
        // 'email.unique' => 'email đã được sử dụng',
        // 'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
        // 'password.max' => 'Mật khẩu không quá 30 ký tự',
        // 'SDT.numeric' => 'SDT không đúng định dạng',
        // ]);

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
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $user->updated_at = $dt;
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
        $user->TrangThai = "0";
        $user->save();
        $user->delete();
        return redirect()->route("quanlyTKView");
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

    public function layDsUserModal(Request $request)
    {
        $users = User::select(['id', 'HoTen', 'email', 'SDT', 'AnhDaiDien', 'LoaiTaiKhoan']);

        return datatables()->of($users)->make(true);
    }

    public function layDsUserAjax()
    {
        $users = User::where("TrangThai","1")->get();
        return DataTables::of($users)->make(true);
    }
}
