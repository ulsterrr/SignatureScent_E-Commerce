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
Route::post('admin/cap-nhat-tai-khoan/{id}',[TaiKhoanController::class,'capNhatTaiKhoan'])
->name('capnhatTK-upd');
Route::get('admin/xoa-tai-khoan/{id}',[TaiKhoanController::class,'xoaTaiKhoan'])
->name('xoaTK-del');
Route::post('admin/them-tai-khoan',[TaiKhoanController::class,'themTaiKhoan'])->name('themTK-add');

//View Quản Lý Tài Khoản
Route::get('admin/quan-ly-tai-khoan',[TaiKhoanController::class,'loadDSTaiKhoanView'])->name('quanlyTKView');
Route::get('admin/them-moi-tai-khoan',[TaiKhoanController::class,'themTaiKhoanView'])->name('themTKView');
Route::get('admin/chi-tiet-tai-khoan/{id}',[TaiKhoanController::class,'chiTietTaiKhoanView'])->name('chitietTK');
Route::get('admin/cap-nhat-tai-khoan/{id}',[TaiKhoanController::class,'capNhatTaiKhoanView'])->name('capnhatTK-view');
Route::post('admin/cap-nhat-tai-khoan/doi-anh-dai-dien/{id}', [TaiKhoanController::class, 'doiAnhDaiDien'])->name('capnhat-AnhDaiDien');
//lấy ds user cho modal
Route::get('dsUserModal',[TaiKhoanController::class,'layDsUserModal'])->name('dsUserModal');
Route::get('dsUserAjax',[TaiKhoanController::class,'layDsUserAjax'])->name('dsUserAjax');

//View Quản Lý Nhân Viên
Route::get('admin/quan-ly-nhan-vien',[NhanVienController::class,'loadDSNhanVienView'])->name('quanly-thongtin-nv-view');
Route::get('admin/them-moi-nhan-vien',[NhanVienController::class,'themNhanVienView'])->name('them-thongtin-nv-view');
Route::get('admin/chi-tiet-nhan-vien/{id}',[NhanVienController::class,'chiTietNhanVien'])
->name('chi-tiet-nv-view');
Route::get('admin/cap-nhat-nhan-vien/{id}',[NhanVienController::class,'capNhatThongTinNVienView'])
->name('capnhatTKNV-view');

//CRUD Quản Lý Nhân Viên
Route::post('admin/cap-nhat-thong-tin-nhan-vien/{id}',[NhanVienController::class,'capNhatThongTinNVien'])
->name('capnhat-thongtin-nv-upd');

Route::get('admin/xoa-nhan-vien/{id}',[NhanVienController::class,'xoaNhanVien'])
->name('xoa-thongtin-nv-del');

Route::post('admin/them-nhan-vien',[NhanVienController::class,'themNhanVien'])
->name('them-moi-nv-add');
//
//CRUD Quản Lý Khách hàng và Chi Nhánh
Route::post('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHang'])->name('themKH-add');
Route::post('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanh'])->name('themmoiCN-add');
Route::post('admin/cap-nhat-chi-nhanh/{id}',[ChiNhanhController::class,'capNhatChiNhanh'])
->name('capnhatCN-upd');
Route::post('admin/xoa-chi-nhanh/{id}',[ChiNhanhController::class,'xoaChiNhanh'])
->name('xoaCN-del');
Route::post('admin/cap-nhat-khach-hang/{id}',[KhachHangController::class,'capNhatKhachHang'])
->name('capnhatKH-upd');

//View Quản Lý Khách Hàng và Chi Nhánh
Route::get('admin/quan-ly-khach-hang',[KhachHangController::class,'loadDSKhachHangView'])->name('quanlyKH-view');
Route::get('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHangView'])->name('themKH-view');
Route::get('admin/quan-ly-chi-nhanh',[ChiNhanhController::class,'loadDSChiNhanhView'])->name('quanlyCN-view');
Route::get('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanhView'])->name('themmoiCN-view');
Route::get('admin/chi-tiet-chi-nhanh/{id}',[ChiNhanhController::class,'chiTietChiNhanhView'])->name('chitietCN-view');
Route::get('admin/quan-ly-feedback',[DanhMucController::class,'loadDSFeedback'])->name('feedback');
Route::get('admin/cap-nhat-chi-nhanh/{id}',[ChiNhanhController::class,'capNhatChiNhanhView'])
->name('capnhatCN-view');
Route::get('admin/cap-nhat-khach-hang/{id}',[KhachHangController::class,'capNhatKhachHangView'])
->name('capnhatKH-view');

//Quản Lý Sản Phẩm View
Route::get('admin/quan-ly-san-pham',[SanPhamController::class,'loadSPView'])->name('qly-spham-view');
Route::get('admin/them-moi-san-pham',[SanPhamController::class,'themSPhamView'])->name('themSPham-view');
Route::get('admin/cap-nhat-san-pham/{id}',[SanPhamController::class,'capNhatSPhamView'])
->name('capnhatSPham-view');
Route::get('admin/chi-tiet-san-pham/{id}',[SanPhamController::class,'chiTietSPhamView'])
->name('chitietSPham-view');

//CRUD Sản Phẩm Admin
Route::post('admin/xoa-san-pham',[SanPhamController::class,'xoaSPham'])->name('xoaSPham-del');
Route::post('admin/them-moi-san-pham',[SanPhamController::class,'themSPham'])->name('themSPham-add');
Route::post('admin/cap-nhat-san-pham/{id}',[SanPhamController::class,'capNhatSPham'])
->name('capnhatSPham-upd');

//Quản lý kho hàng

Route::post('admin/nhap-hang',[KhoHangController::class,'nhapHang'])->name('nhaphang');

Route::post('admin/xuat-hang',[KhoHangController::class,'xuatHang'])->name('xuathang');

Route::post('admin/dieu-chuyen-hang',[KhoHangController::class,'dieuChuyenHang'])->name('dieuchuyenhang');

Route::get('admin/quan-ly-hang-hoa',[KhoHangController::class,'loadHangHoa'])->name('quanly-hanghoa');

//Quản Lý bán hàng
//CRUD Đơn hàng
Route::post('admin/tao-don-hang',[BanHangController::class,'taoDonHang'])->name('taodonhang-add');
Route::post('admin/sua-don-hang',[BanHangController::class,'suaDonHang'])->name('suadonhang-upd');
Route::get('admin/xoa-don-hang',[BanHangController::class,'xoaDonHang'])->name('xoadonhang-del');

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

