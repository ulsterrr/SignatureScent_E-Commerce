<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HeThongController extends Controller
{
    public function dangNhap()
    {
        return view('dang-nhap');
    }
    public function xulyDangNhap(Request $req)
    {

        /*$taikhoan = TaiKhoan::where('taikhoan', $req->ten_tai_khoan)->first();
        if(empty($taikhoan)) {
        echo "Not user";
        }
        else if ($taikhoan->matkhau != $req->mat_khau){
        echo "Sai mat khau";
        }
        else if ($taikhoan->maloaitk == 1) {
        return redirect()->route('giang-vien')->with(compact('taikhoan'));
        }
        else {
        return redirect()->route('hoc-sinh')->with(compact('taikhoan'));
        }*/
        $credentials = $req->only('username', 'password');

        $taikhoan = TaiKhoan::where('username', $req->username)->first();

        if (Auth::attempt($credentials)) {
            // Chứng thực thành công
            if ($taikhoan->maloaitk == 3) {
                return redirect()->route('Admin')->with(compact('taikhoan'));
            } else
            if ($taikhoan->maloaitk == 1) {
                return redirect()->route('giang-vien')->with(compact('taikhoan'));
            } else {
                return redirect()->route('hoc-sinh')->with(compact('taikhoan'));
            }
        } else if (empty(TaiKhoan::where('username', $req->username)->first())) {
            return redirect()->route('dang-nhap')->with('message', 'Không tìm thấy tài khoản, vui lòng đăng nhập lại!');
        } else if ($taikhoan->matkhau != Hash::make($req->mat_khau)) {
            return redirect()->route('dang-nhap')->with('message', 'Sai mật khẩu, vui lòng đăng nhập lại!');
        } else {
            return redirect()->route('dang-nhap')->with('message', 'Lỗi đăng nhập, vui lòng thử lại!');
        }

    }

    public function quenMK()
    {

    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
}
