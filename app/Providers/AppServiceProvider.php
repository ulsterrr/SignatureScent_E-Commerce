<?php

namespace App\Providers;

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

        view()->composer('layouts.admin.header-menu', function($view) {

            $emails = auth()->user()->email;
            $thongbao = ThongBao::where([['NguoiNhan',$emails],['TrangThai','NEW']])->get();
            $view->with(['thongbao' => $thongbao]);
        });
    }
}
