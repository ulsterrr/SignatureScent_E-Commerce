<?php

use App\Http\Controllers\BanHangController;
use App\Http\Controllers\ChiNhanhController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HeThongController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TaiKhoanController;
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


//Đăng nhập, Đăng ký, Quên mật khẩu, Đổi mật khẩu,Cập nhật thông tin tài khoản
Route::post('/he-thong/dang-nhap', [HeThongController::class, 'xulyDangNhap'])->name('xuly-dangnhap');
Route::get('/he-thong/dang-xuat', [HeThongController::class, 'dangXuat'])->name('xuly-dangxuat');
Route::post('/he-thong/dang-ky', [HeThongController::class, 'dangKy'])->name('xuly-dangky');
Route::post('/he-thong/quen-mat-khau', [HeThongController::class, 'quenMK'])->name('xuly-quenMK');
Route::post('/he-thong/cap-nhat-tai-khoan', [HeThongController::class, 'capNhatTK'])->name('capnhatTK');

Route::view('/tai-khoan', 'layouts.tai-khoan.tai-khoan')->name('tai-khoan');

Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

Route::get('/test', function () {

    Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

})->middleware('auth', 'kiemTraQuyen:test');

Route::view('/dang-nhap', 'layouts.tai-khoan.dang-nhap')->name('dang-nhap');
//Route::view('/user', 'he-thong.danh-muc.tai-khoan.ds-user')->name('user');

/*
|--------------------------------------------------------------------------
| ASSETS Routes END
|--------------------------------------------------------------------------

*/

//Admin
//Quản Lý Danh Mục
//CRUD Quản Lý Tài Khoản
Route::post('admin/cap-nhat-tai-khoan',[TaiKhoanController::class,'capNhatTaiKhoan'])
->name('capnhatTK-Update');
Route::post('admin/xoa-tai-khoan',[TaiKhoanController::class,'xoaTaiKhoan'])
->name('xoaTK-Delete');
Route::post('admin/them-tai-khoan',[TaiKhoanController::class,'themTaiKhoan'])
->name('themTK-Create');

//View Quản Lý Tài Khoản
Route::get('admin/quan-ly-tai-khoan',[TaiKhoanController::class,'loadDSTaiKhoanView'])->name('quanlyTKView');
Route::get('admin/them-moi-tai-khoan',[TaiKhoanController::class,'themTaiKhoanView'])->name('themTKView');
Route::get('admin/chi-tiet-tai-khoan',[TaiKhoanController::class,'chiTietTaiKhoanView'])->name('chitietTK');

//View Quản Lý Nhân Viên
Route::get('admin/quan-ly-nhan-vien',[NhanVienController::class,'loadDSNhanVienView'])->name('quanly-thongtin-nv-view');
Route::get('admin/them-moi-nhan-vien',[NhanVienController::class,'themNhanVienView'])->name('them-thongtin-nv-view');
Route::get('admin/chi-tiet-nhan-vien',[NhanVienController::class,'chiTietNhanVienView'])
->name('chi-tiet-nv-view');

//CRUD Quản Lý Nhân Viên
Route::post('admin/cap-nhat-thong-tin-nhan-vien',[NhanVienController::class,'capNhatThongTinNVien'])
->name('capnhat-thongtin-nv-Update');

Route::post('admin/xoa-nhan-vien',[NhanVienController::class,'xoaNhanVien'])
->name('xoa-thongtin-nv-Delete');

Route::post('admin/them-nhan-vien',[NhanVienController::class,'themNhanVien'])
->name('them-moi-nv-Create');
//
//CRUD Quản Lý Khách hàng và Chi Nhánh
Route::post('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHang'])->name('themKH-Create');
Route::post('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanh'])->name('themmoiCN-Create');

//View Quản Lý Khách Hàng và Chi Nhánh
Route::get('admin/quan-ly-khach-hang',[KhachHangController::class,'loadDSKhachHangView'])->name('quanlyKH-view');
Route::get('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHangView'])->name('themKH-view');
Route::get('admin/quan-ly-chi-nhanh',[ChiNhanhController::class,'loadDSChiNhanhView'])->name('quanlyCN-view');
Route::get('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanhView'])->name('themmoiCN-view');
Route::get('admin/chi-tiet-chi-nhanh',[ChiNhanhController::class,'chiTietChiNhanhView'])->name('chitietCN-view');
Route::get('admin/quan-ly-feedback',[DanhMucController::class,'loadDSFeedback'])->name('feedback');

//Quản lý kho hàng

Route::post('admin/nhap-hang',[KhoHangController::class,'nhapHang'])->name('nhaphang');

Route::post('admin/xuat-hang',[KhoHangController::class,'xuatHang'])->name('xuathang');

Route::post('admin/dieu-chuyen-hang',[KhoHangController::class,'dieuChuyenHang'])->name('dieuchuyenhang');

Route::get('admin/quan-ly-hang-hoa',[KhoHangController::class,'loadHangHoa'])->name('quanly-hanghoa');

//Quản Lý bán hàng
//CRUD Đơn hàng
Route::post('admin/tao-don-hang',[BanHangController::class,'taoDonHang'])->name('taodonhang-Create');
Route::post('admin/sua-don-hang',[BanHangController::class,'suaDonHang'])->name('suadonhang-Update');
Route::post('admin/xoa-don-hang',[BanHangController::class,'xoaDonHang'])->name('xoadonhang-Delete');

Route::post('admin/xu-ly-don-hang',[BanHangController::class,'xuLyDon'])->name('xuly-donhang-Edit');

Route::get('admin/danh-sach-don-hang',[BanHangController::class,'loadDSDonHang'])->name('danhsach-donhang-view');

//Báo cáo thống kê
Route::get('admin/bao-cao-ton-kho',[ThongKeController::class,'loadDSTonKho'])->name('baocao-tonkho-view');

Route::get('admin/bao-cao-doanh-thu',[ThongKeController::class,'loadDSDoanhThu'])->name('baocao-doanhthu-view');

Route::get('admin/bao-cao-san-pham-ban-chay',[ThongKeController::class,'loadSPBanChay'])
->name('baocao-sanpham-banchay-view');


//User
Route::get('user/danh-sach-yeu-thich',[SanPhamController::class,'loadSDYeuThich'])->name('danhsach-yeuthich-view');

Route::get('user/gio-hang',[GioHangController::class,'loadGioHang'])->name('giohang-view');

Route::get('user/gio-hang/chi-tiet-gio-hang',[GioHangController::class,'loadChiTietGioHang'])
->name('chitiet-giohang-view');

Route::get('user/gio-hang/chi-tiet-gio-hang/thanh-toan')
->name('thanhtoan-view');

Route::get('user/chi-tiet-san-pham',[SanPhamController::class,'loadChiTietSP'])->name('chitiet-sanpham-view');

Route::get('user/loai-san-pham',[SanPhamController::class,'loadSPTheoLoai'])->name('loaisanpham-view');

Route::get('user/don-hang',[DonHangController::class,'loadDonHang'])->name('donhang-view');

Route::get('user/don-hang/chi-tiet-don-hang',[DonHangController::class,'loadChiTietDonHang'])->name('chitiet-donhang-view');

