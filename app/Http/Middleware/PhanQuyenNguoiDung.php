<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PhanQuyenNguoiDung
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $maQuyen)
    {
        // kiểm tra nếu đúng quyền thì tiếp tục, không có mặc định về home
        if ($request->user() && $request->user()->loaiTaiKhoan->phanQuyen->contains('MaQuyen', $maQuyen)) {
            return $next($request);
        }

        if($request->user() && ($request->user()->loaiTaiKhoan->MaLoai == 'A' || $request->user()->loaiTaiKhoan->MaLoai == 'M')) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('homepage');

    }
}
