<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HeThongController extends Controller
{
    public function xulyDangNhap(Request $req)
    {

        //$credentials = $req->only('email', 'password');
        $credentials = ['email' => $req->email, 'password' => $req->password];

        // lấy dữ liệu db theo tên tài khoản
        $taikhoan = User::where('email', strval($req->email))->first();

        //dd($credentials);
        //dd(Hash::make($req->password));
        //dd($taikhoan);
        if (Auth::attempt($credentials)) {
            // Chứng thực thành công
            $req->session()->regenerate();
            dd($credentials);
            if ($taikhoan->LoaiTaiKhoan == 'A') {
                return redirect()->route('dashboard')->with(compact('taikhoan'));
            } else
            if ($taikhoan->LoaiTaiKhoan == 'C') {
                return redirect()->route('client')->with(compact('taikhoan'));
            }
        } else if (empty($taikhoan->email)) {
            $errorMessage = 'Không tìm thấy tài khoản, vui lòng đăng nhập lại!';
            return redirect()->route('client')->with('message', $errorMessage);
        } else if ($taikhoan->password != Hash::make($req->password)) {
            $errorMessage = 'Sai mật khẩu, vui lòng đăng nhập lại!';
            return redirect()->route('client')->with('message', $errorMessage);
        } else {
            $errorMessage = 'Lỗi đăng nhập, vui lòng thử lại!';
            return redirect()->route('client')->with('message', $errorMessage);
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
