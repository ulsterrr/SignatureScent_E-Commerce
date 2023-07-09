<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->loaiTaiKhoan->MaLoai == 'A' || Auth::user()->loaiTaiKhoan->MaLoai == 'M' || Auth::user()->loaiTaiKhoan->MaLoai == 'E'){
                    return redirect()->route('dashboard');
                }
                else if (Auth::user()->loaiTaiKhoan->MaLoai == 'C' || Auth::user()->loaiTaiKhoan->MaLoai == 'V'){
                    return redirect()->route('homepage');
                }
            }
        }

        return $next($request);
    }
}
