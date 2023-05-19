<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class VerificationController extends Controller
{

public function verifyEmail($userId, $token)
{
    // Tìm user theo ID
    $user = User::findOrFail($userId);
    // Kiểm tra token xác thực
    if ($user->email_verification_token === $token) {
        // Xác thực email của user
        $user->markEmailAsVerified();
        // Đăng nhập user tự động (nếu muốn)
        // Auth::login($user);

        // Redirect đến trang xác thực thành công hoặc hiển thị thông báo thành công
        return redirect()->route('dang-nhap')->with('message','Xác thực thành công, mời bạn đăng nhập lại để sử dụng hệ thống');
    }

    // Redirect đến trang xác thực không thành công hoặc hiển thị thông báo lỗi
    return redirect()->route('dang-nhap')->with('message','Xác thực thất bại, xin vui lòng kiểm tra email hoặc liên hệ hotline để được hỗ trợ!');
}

}
