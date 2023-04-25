<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class KhachHangController extends Controller
{
    public function loadDSKhachHangView(){
        $khachhang = User::where([['LoaiTaiKhoan','C'],['TrangThai','1']])->get();
        return view('he-thong.danh-muc.khach-hang.ds-khachhang')->with('KhachHang',$khachhang);
    }


    public function themKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.them-khachhang');
    }

    public function themKhachHang(Request $request){
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
        return redirect()->route('quanlyKH-view');
    }
    public function chiTietKhachHangView($id){
        $khachhang = User::find($id);
        return view('he-thong.danh-muc.khach-hang.khachhang-details',compact('khachhang'));
    }
    public function capNhatKhachHangView($id){
        $khachhang = User::find($id);
        return view('he-thong.danh-muc.khach-hang.capnhat-khachhang',compact('khachhang'));
    }
    public function capNhatKhachHang(Request $request, $id){
        $khachhang = User::findOrFail($id);
        $khachhang->email = $request->email;
        // $nhanvien->password = Hash::make($request->password);
        $khachhang->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $khachhang->HoTen = $request->HoTen;
        $khachhang->GioiTinh = $request->GioiTinh;
        $khachhang->DiaChi = $request->DiaChi;
        $khachhang->SDT = $request->SDT;
        $khachhang->QuanHuyen = $request->QuanHuyen;
        $khachhang->TinhThanh = $request->TinhThanh;
        $khachhang->MaGiaoDien = "1";
        $khachhang->ChiNhanh = "";
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();
        $khachhang->NgaySinh = $date_time;
        $khachhang->TrangThai = $request->TrangThai;
        $khachhang->NguoiTao = "";
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $khachhang->updated_at = $dt;
        $khachhang->save();
        session()->flash('message','Cập nhật khách hàng thành công!');
        return redirect()->route('quanlyKH-view');
    }
    public function layDsKHangModal(Request $request)
    {
        $users = User::select(['id', 'HoTen', 'email', 'SDT', 'AnhDaiDien', 'LoaiTaiKhoan']);

        return datatables()->of($users)->make(true);
    }

    public function layDsKHangAjax()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
    }
}
