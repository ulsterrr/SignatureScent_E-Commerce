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

        //check nếu đăng nhập rồi thì quay lại route
        if(Auth::check()){
            return redirect()->route('homepage')->with(compact('taikhoan'));
        }

        if (Auth::attempt($credentials)) {
            // Chứng thực thành công
            if ($taikhoan->LoaiTaiKhoan == 'A') {
                $req->session()->regenerate();
                return redirect()->route('dashboard')->with(compact('taikhoan'));
            } else
            if ($taikhoan->LoaiTaiKhoan == 'C') {
                $req->session()->regenerate();
                return redirect()->route('homepage')->with(compact('taikhoan'));
            }
        } else if (empty($taikhoan->email)) {
            $errorMessage = 'Không tìm thấy tài khoản, vui lòng đăng nhập lại!';
            return back()->with('message', $errorMessage);
        } else if ($taikhoan->password != Hash::make($req->password)) {
            $errorMessage = 'Sai mật khẩu, vui lòng đăng nhập lại!';
            return back()->with('message', $errorMessage);
        } else {
            $errorMessage = 'Lỗi đăng nhập, vui lòng thử lại!';
            //return redirect()->route('homepage')->with('message', $errorMessage);
            return back()->with('message', $errorMessage);
        }

    }

    public function quenMK()
    {

    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
