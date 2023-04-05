<?php

use App\Http\Controllers\HeThongController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ASSETS Routes START
|--------------------------------------------------------------------------
*/

//ROUTE DASHBOARD START //
// Route::get('/', function () {
//     return view('dashboard.dashboard');
// });
Route::get('/', function () {
    return view('layouts.homepage.home');
})->name('client');

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
Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

//Tab Ecommerce
Route::view('apps/invoice', 'apps.invoice')->name('invoice');
Route::view('apps/ecommerce/products', 'apps.ecommerce.products')->name('ecommerce-products');
Route::view('apps/ecommerce/product-details', 'apps.ecommerce.product-details')->name('ecommerce-product-details');
Route::view('apps/ecommerce/cart', 'apps.ecommerce.cart')->name('ecommerce-cart');
Route::view('apps/ecommerce/checkout', 'apps.ecommerce.checkout')->name('ecommerce-checkout');

//Charts
Route::view('charts/echarts', 'charts.echarts')->name('echarts');

//Đăng nhập
Route::post('/he-thong/dang-nhap', [HeThongController::class, 'xulyDangNhap'])->name('xuly-dangnhap');
Route::get('/he-thong/dang-xuat', [HeThongController::class, 'dangXuat'])->name('xuly-dangxuat');
Route::view('/tai-khoan', 'layouts.tai-khoan.tai-khoan')->name('tai-khoan');



/*
|--------------------------------------------------------------------------
| ASSETS Routes END
|--------------------------------------------------------------------------

*/
