<?php

use App\Http\Controllers\BanHangController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HeThongController;
use App\Http\Controllers\KhoHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongKeController;
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



Route::get('/test', function () {

    Route::view('/dashboard', 'dashboard.dashboard')->name('dashboard');

})->middleware('auth', 'kiemTraQuyen:test');

/*
|--------------------------------------------------------------------------
| ASSETS Routes END
|--------------------------------------------------------------------------

*/

//Admin
//Quản Lý Danh Mục
//CRUD Quản Lý Tài Khoản
Route::get('admin/quan-ly-tai-khoan',[TaiKhoanController::class,'loadDSTaiKhoan'])->name('quanlyTK');

Route::get('admin/cap-nhat-tai-khoan',[TaiKhoanController::class,'capNhatTaiKhoan'])
->name('capnhatTK-Admin');

Route::get('admin/xoa-tai-khoan',[TaiKhoanController::class,'xoaTaiKhoan'])
->name('xoaTK-Admin');

Route::get('admin/them-tai-khoan',[TaiKhoanController::class,'themTaiKhoan'])
->name('themTK-Admin');

//CRUD Quản Lý Nhân Viên
Route::get('admin/quan-ly-nhan-vien',[NhanVienController::class,'loadDSNhanVien'])->name('quanly-thongtin-nv');

Route::get('admin/cap-nhat-thong-tin-nhan-vien',[NhanVienController::class,'capNhatThongTinNVien'])
->name('capnhat-thongtin-nv');

Route::get('admin/xoa-nhan-vien',[NhanVienController::class,'xoaNhanVien'])
->name('xoa-thongtin-nv');

Route::get('admin/them-nhan-vien',[NhanVienController::class,'themNhanVien'])
->name('them-thongtin-nv');
//

Route::get('admin/quan-ly-khach-hang',[DanhMucController::class,'loadDSKhacHang'])->name('quanlyKH');

Route::get('admin/quan-ly-chi-nhanh',[DanhMucController::class,'loadDSChiNhanh'])->name('quanlyCN');

Route::get('admin/quan-ly-feedback',[DanhMucController::class,'loadDSFeedback'])->name('quanlyfeedback');

//Quản lý kho hàng

Route::post('admin/nhap-hang',[KhoHangController::class,'nhapHang'])->name('nhaphang');

Route::post('admin/xuat-hang',[KhoHangController::class,'xuatHang'])->name('xuathang');

Route::post('admin/dieu-chuyen-hang',[KhoHangController::class,'dieuChuyenHang'])->name('dieuchuyenhang');

Route::get('admin/quan-ly-hang-hoa',[KhoHangController::class,'loadHangHoa'])->name('quanly-hanghoa');

//Quản Lý bán hàng
//CRUD Đơn hàng
Route::post('admin/tao-don-hang',[BanHangController::class,'taoDonHang'])->name('taodonhang');
Route::post('admin/sua-don-hang',[BanHangController::class,'suaDonHang'])->name('suadonhang');
Route::post('admin/xoa-don-hang',[BanHangController::class,'xoaDonHang'])->name('xoadonhang');

Route::post('admin/xu-ly-don-hang',[BanHangController::class,'xuLyDon'])->name('xuly-donhang');

Route::get('admin/danh-sach-don-hang',[BanHangController::class,'loadDSDonHang'])->name('danhsach-donhang');

//Báo cáo thống kê
Route::get('admin/bao-cao-ton-kho',[ThongKeController::class,'loadDSTonKho'])->name('baocao-tonkho');

Route::get('admin/bao-cao-doanh-thu',[ThongKeController::class,'loadDSDoanhThu'])->name('baocao-doanhthu');

Route::get('admin/bao-cao-san-pham-ban-chay',[ThongKeController::class,'loadSPBanChay'])
->name('baocao-sanpham-banchay');


//User
Route::view('user/danh-sach-yeu-thich',[SanPhamController::class,'loadSDYeuThich'])->name('danhsach-yeuthich');

Route::get('user/gio-hang',[GioHangController::class,'loadGioHang'])->name('giohang');

Route::get('user/gio-hang/chi-tiet-gio-hang',[GioHangController::class,'loadChiTietGioHang'])
->name('chitiet-giohang');

Route::get('user/gio-hang/chi-tiet-gio-hang/thanh-toan')
->name('thanhtoan');

Route::get('user/chi-tiet-san-pham',[SanPhamController::class,'loadChiTietSP'])->name('chitiet-sanpham');

Route::get('user/loai-san-pham',[SanPhamController::class,'loadSPTheoLoai'])->name('loaisanpham');

Route::get('user/don-hang',[DonHangController::class,'loadDonHang'])->name('donhang');

Route::get('user/don-hang/chi-tiet-don-hang',[DonHangController::class,'loadChiTietDonHang'])->name('chitiet-donhang');

