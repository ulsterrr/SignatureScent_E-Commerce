<?php

namespace App\Providers;

use App\Models\GioHang;
use App\Models\LoaiSanPham;
use App\Models\ThongBao;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('layouts.admin.header-menu', function ($view) {
            $emails = auth()->user()->email;
            $thongbao = ThongBao::where([['NguoiNhan', $emails], ['TrangThai', 'NEW']])->get();
            $view->with(['thongbao' => $thongbao]);
        });

        view()->composer('layouts.webpage.header-webpage', function ($view) {

            if (Auth::check()) {
                $emails = auth()->user()->email;
                $gioHang = GioHang::where([['NguoiTao', $emails],['TrangThai', 0]])->get();
                $view->with(['gioHang' => $gioHang]);
            }
        });

        view()->composer('layouts.homepage.header-client', function ($view) {
            if (Auth::check()) {
                $emails = auth()->user()->email;
                $gioHang = GioHang::where([['NguoiTao', $emails],['TrangThai', 0]])->get();
                $view->with(['gioHang' => $gioHang]);
            }
        });

        view()->composer('layouts/webpage/header-webpage', function ($view) {
            $loaisp = LoaiSanPham::all();
            $view->with(['loaiSP' => $loaisp]);
        });

        view()->composer('layouts/homepage/header-client', function ($view) {
            $loaisp = LoaiSanPham::all();
            $view->with(['loaiSP' => $loaisp]);
        });

        view()->composer('layouts/webpage/footer-main', function ($view) {
            $loaisp = LoaiSanPham::all();
            $view->with(['loaiSP' => $loaisp]);
        });

        view()->composer('layouts/homepage/footer-main', function ($view) {
            $loaisp = LoaiSanPham::all();
            $view->with(['loaiSP' => $loaisp]);
        });

        view()->composer('nguoidung.cua-hang', function ($view) {
            $view->with(['sanPham' => []]);
        });
    }
}
