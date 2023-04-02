<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ASSETS Routes START
|--------------------------------------------------------------------------
*/

//ROUTE DASHBOARD START //
Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/client', function () {
    return view('layouts.client.home');
});

Route::get('large-compact-sidebar/dashboard/dashboard', function () {
    // đặt giao diện menu compact
    session(['layout' => 'compact']);
    return view('dashboard.dashboard');
})->name('compact');

Route::get('large-sidebar/dashboard/dashboard', function () {
    // đặt giao diện menu bình thường
    session(['layout' => 'normal']);
    return view('dashboard.dashboard');
})->name('normal');

Route::get('horizontal-bar/dashboard/dashboard', function () {
    // đặt giao diện menu ngang
    session(['layout' => 'horizontal']);
    return view('dashboard.dashboard');
})->name('horizontal');
//ROUTE DASHBOARD END //


//Normal tab
Route::view('dashboard/dashboard', 'dashboard.dashboard')->name('dashboard');
Route::view('sessions/signIn', 'sessions.signIn')->name('signIn');

//Tab Ecommerce
Route::view('apps/invoice', 'apps.invoice')->name('invoice');
Route::view('apps/ecommerce/products', 'apps.ecommerce.products')->name('ecommerce-products');
Route::view('apps/ecommerce/product-details', 'apps.ecommerce.product-details')->name('ecommerce-product-details');
Route::view('apps/ecommerce/cart', 'apps.ecommerce.cart')->name('ecommerce-cart');
Route::view('apps/ecommerce/checkout', 'apps.ecommerce.checkout')->name('ecommerce-checkout');

//Charts
Route::view('charts/echarts', 'charts.echarts')->name('echarts');

//Đăng nhập
Route::vỉew('apps/ecommerce/dang-nhap','apps.ecommerce.dang-nhap')->name('dang-nhap');



/*
|--------------------------------------------------------------------------
| ASSETS Routes END
|--------------------------------------------------------------------------

*/
