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
})->name('homepage');

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


//Tab Ecommerce
Route::view('he-thong/invoice', 'he-thong.invoice')->name('invoice');
Route::view('he-thong/ecommerce/products', 'he-thong.ecommerce.products')->name('ecommerce-products');
Route::view('he-thong/ecommerce/product-details', 'he-thong.ecommerce.product-details')->name('ecommerce-product-details');
Route::view('he-thong/ecommerce/cart', 'he-thong.ecommerce.cart')->name('ecommerce-cart');
Route::view('he-thong/ecommerce/checkout', 'he-thong.ecommerce.checkout')->name('ecommerce-checkout');

//Charts
Route::view('charts/echarts', 'charts.echarts')->name('echarts');

//Đăng nhập
Route::post('/xl-dang-nhap', [HeThongController::class, 'xulyDangNhap'])->name('xuly-dangnhap');
Route::get('/xl-dang-xuat', [HeThongController::class, 'dangXuat'])->name('xuly-dangxuat');
Route::view('/tai-khoan', 'layouts.tai-khoan.tai-khoan')->name('tai-khoan');

Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

Route::get('/test', function () {

    Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

})->middleware('auth', 'kiemTraQuyen:test');

Route::view('/dang-nhap', 'layouts.tai-khoan.dang-nhap')->name('dang-nhap');

/*
|--------------------------------------------------------------------------
| ASSETS Routes END
|--------------------------------------------------------------------------

*/
