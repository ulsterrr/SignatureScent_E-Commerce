<?php

use App\Http\Controllers\BanHangController;
use App\Http\Controllers\ChiNhanhController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HeThongController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoHangController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\VerificationController;
use App\Models\KhoHang;
use App\Models\NhapHangMoi;
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
// Route::get('/', function () {
//     return view('layouts.homepage.home');
// })->name('homepage');
Route::get('/',[SanPhamController::class,'loadSPClient']
)->name('homepage');
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
//ADMIN Quản lý
//CRUD Quản Lý Tài Khoản
    Route::post('admin/cap-nhat-tai-khoan/{id}',[TaiKhoanController::class,'capNhatTaiKhoan'])->name('capnhatTK-upd');
    Route::get('admin/xoa-tai-khoan/{id}',[TaiKhoanController::class,'xoaTaiKhoan'])->name('xoaTK-del');
    Route::post('admin/them-tai-khoan',[TaiKhoanController::class,'themTaiKhoan'])->name('themTK-add');
    Route::post('kiemtra-email', [TaiKhoanController::class,'kiemTraTrungEmail'])->name('kiemtra-email');
    Route::post('admin/thong-tin-tai-khoan/{id}',[TaiKhoanController::class,'thongTinTaiKhoan'])->name('thongtinTK');
    Route::get('admin/doi-mat-khau/{id}',[TaiKhoanController::class,'doiMKAmin'])->name('doiMK-Amin');
    Route::post('admin/kiem-mat-khau',[TaiKhoanController::class,'kiemTraMatKhau'])->name('kiemtra-matkhau');

    //View Quản Lý Tài Khoản
    Route::get('admin/quan-ly-tai-khoan',[TaiKhoanController::class,'loadDSTaiKhoanView'])->name('quanlyTKView');
    Route::get('admin/them-moi-tai-khoan',[TaiKhoanController::class,'themTaiKhoanView'])->name('themTKView');
    Route::get('admin/chi-tiet-tai-khoan/{id}',[TaiKhoanController::class,'chiTietTaiKhoanView'])->name('chitietTK');
    Route::get('admin/cap-nhat-tai-khoan/{id}',[TaiKhoanController::class,'capNhatTaiKhoanView'])->name('capnhatTK-view');
    Route::get('admin/thong-tin-tai-khoan/{id}',[TaiKhoanController::class,'thongTinTaiKhoanView'])->name('thongtinTK-view');


    Route::post('admin/cap-nhat-tai-khoan/doi-anh-dai-dien/{id}', [TaiKhoanController::class, 'doiAnhDaiDien'])->name('capnhat-AnhDaiDien');
    //lấy ds user cho modal
    Route::get('dsUserModal',[TaiKhoanController::class,'layDsUserModal'])->name('dsUserModal');
    Route::get('dsUserAjax',[TaiKhoanController::class,'layDsUserAjax'])->name('dsUserAjax');
    Route::get('layLoaiSPAjax',[LoaiSanPhamController::class,'layLoaiSPAjax'])->name('layLoaiSPAjax');

    //View Quản Lý Nhân Viên
    Route::get('admin/quan-ly-nhan-vien',[NhanVienController::class,'loadDSNhanVienView'])->name('quanly-thongtin-nv-view');
    Route::get('admin/them-moi-nhan-vien',[NhanVienController::class,'themNhanVienView'])->name('them-thongtin-nv-view');
    Route::get('admin/chi-tiet-nhan-vien/{id}',[NhanVienController::class,'chiTietNhanVienView'])->name('chi-tiet-nv-view');
    Route::get('admin/cap-nhat-nhan-vien/{id}',[NhanVienController::class,'capNhatThongTinNVienView'])->name('capnhatTKNV-view');

    //lấy ds nhân viên cho modal
    Route::get('dsNVienModal',[NhanVienController::class,'layDsNvienModal'])->name('dsNVienModal');
    Route::get('dsNvienAjax',[NhanVienController::class,'layDsNVienAjax'])->name('dsNvienAjax');

    //CRUD Quản Lý Nhân Viên
    Route::post('admin/cap-nhat-thong-tin-nhan-vien/{id}',[NhanVienController::class,'capNhatThongTinNVien'])->name('capnhat-thongtin-nv-upd');
    Route::get('admin/xoa-nhan-vien/{id}',[NhanVienController::class,'xoaNhanVien'])->name('xoaNV-del');
    Route::post('admin/them-nhan-vien',[NhanVienController::class,'themNhanVien'])->name('them-moi-nv-add');

    //lấy ds khách hàng cho modal
    Route::get('dsKHangModal',[KhachHangController::class,'layDsKHangModal'])->name('dsKHangModal');
    Route::get('dsKHangAjax',[KhachHangController::class,'layDsKHangAjax'])->name('dsKHangAjax');

    //CRUD Quản Lý Khách hàng và Chi Nhánh
    Route::get('admin/chi-tiet-khach-hang/{id}',[KhachHangController::class,'chiTietKhachHangView'])->name('chitietKHview');
    Route::get('admin/xoa-khach-hang/{id}',[KhachHangController::class,'xoaKhachHang'])->name('xoaKH-del');
    Route::post('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHang'])->name('themKH-add');
    Route::post('client/dang-ky/',[KhachHangController::class,'themKhachHangClient'])->name('themKHC-add');
    Route::post('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanh'])->name('themmoiCN-add');
    Route::post('admin/cap-nhat-chi-nhanh/{id}',[ChiNhanhController::class,'capNhatChiNhanh'])->name('capnhatCN-upd');
    Route::post('admin/xoa-chi-nhanh/{id}',[ChiNhanhController::class,'xoaChiNhanh'])->name('xoaCN-del');
    Route::post('admin/cap-nhat-khach-hang/{id}',[KhachHangController::class,'capNhatKhachHang'])->name('capnhatKH-upd');
    Route::post('kiemtra-chinhanh', [ChiNhanhController::class,'kiemTraTrungMaCN'])->name('kiemtra-macn');
    Route::post('/quen-mat-khau',[KhachHangController::class,'quenMatKhau'])->name('quenMatKhau');

    //View Quản Lý Khách Hàng và Chi Nhánh
    Route::get('admin/quan-ly-khach-hang',[KhachHangController::class,'loadDSKhachHangView'])->name('quanlyKH-view');
    Route::get('admin/them-moi-khach-hang',[KhachHangController::class,'themKhachHangView'])->name('themKH-view');
    Route::get('admin/quan-ly-chi-nhanh',[ChiNhanhController::class,'loadDSChiNhanhView'])->name('quanlyCN-view');
    Route::get('layDsChiNhanhAjax',[ChiNhanhController::class,'layDsChiNhanhAjax'])->name('layDsChiNhanhModal');
    Route::get('admin/them-moi-chi-nhanh',[ChiNhanhController::class,'themChiNhanhView'])->name('themmoiCN-view');
    Route::get('admin/chi-tiet-chi-nhanh/{id}',[ChiNhanhController::class,'chiTietChiNhanhView'])->name('chitietCN-view');
    Route::get('admin/quan-ly-feedback',[DanhMucController::class,'loadDSFeedback'])->name('feedback');
    Route::get('admin/cap-nhat-chi-nhanh/{id}',[ChiNhanhController::class,'capNhatChiNhanhView'])->name('capnhatCN-view');
    Route::get('admin/cap-nhat-khach-hang/{id}',[KhachHangController::class,'capNhatKhachHangView'])->name('capnhatKH-view');
    Route::get('/dang-ky',[KhachHangController::class,'dangKyView'])->name('dangKyView');
    Route::get('/quen-mat-khau',[KhachHangController::class,'quenMatKhauView'])->name('quenMatKhauView');


    //Quản Lý Sản Phẩm View
    Route::get('admin/quan-ly-san-pham',[SanPhamController::class,'loadSPView'])->name('qly-spham-view');
    Route::get('admin/cap-nhat-san-pham/{id}',[SanPhamController::class,'capNhatSPhamView'])->name('capnhatSPham-view');
    Route::get('admin/chi-tiet-san-pham/{id}',[SanPhamController::class,'chiTietSPhamView'])->name('chitietSPham-view');

    //CRUD Sản Phẩm Admin
    Route::get('admin/xoa-san-pham/{id}',[SanPhamController::class,'xoaSPham'])->name('xoaSPham-del');
    Route::get('admin/xoa-san-ct-pham/{id}',[SanPhamController::class,'xoaCTSPham'])->name('xoaCTSPham-del');
    Route::get('layDsSanPhamAjax',[SanPhamController::class,'layDsSanPhamAjax'])->name('layDsSanPhamAjax');
    Route::get('layDsCTSanPhamAjax/{masanpham}',[SanPhamController::class,'layDsCTSanPhamAjax'])->name('layDsCTSanPhamAjax');
    Route::post('admin/them-moi-san-pham',[SanPhamController::class,'themSPham'])->name('themSPham-add');
    Route::post('admin/cap-nhat-san-pham/{id}',[SanPhamController::class,'capNhatSPham'])->name('capnhatSPham-upd');
    Route::post('admin/cap-nhat-ct-san-pham/{id}',[SanPhamController::class,'capNhatCTSPham'])->name('capNhatCTSPham-upd');

//Quản lý kho hàng
    //Quản Lý Loại Sản Phẩm View
    Route::get('admin/quan-ly-loai-san-pham',[LoaiSanPhamController::class,'loadLoaiSPView'])->name('qly-loaispham-view');
    Route::get('admin/them-moi-loai-san-pham',[LoaiSanPhamController::class,'themLoaiSPhamView'])->name('themloaiSPham-view');
    Route::get('admin/cap-nhat-loai-san-pham/{id}',[LoaiSanPhamController::class,'capNhatLoaiSPhamView'])->name('capnhatLoaiSPham-view');
    Route::get('admin/chi-tiet-loai-san-pham/{id}',[LoaiSanPhamController::class,'chiTietLoaiSPhamView'])->name('chitietLoaiSPham-view');

    //CRUD Loại Sản Phẩm Admin
    Route::get('admin/xoa-loai-san-pham/{id}',[LoaiSanPhamController::class,'xoaLoaiSPham'])->name('xoaLoaiSPham-del');
    Route::post('admin/them-moi-loai-san-pham',[LoaiSanPhamController::class,'themLoaiSPham'])->name('themLoaiSPham-add');
    Route::post('admin/cap-nhat-loai-san-pham/{id}',[LoaiSanPhamController::class,'capNhatLoaiSPham'])->name('capnhatLoaiSPham-upd');
    Route::post('kiemtra-loaiSP', [LoaiSanPhamController::class,'kiemTraTrungMaLSP'])->name('kiemtra-malsp');

    // Nhập hàng
    Route::get('admin/danh-sach-nhap-hang',[KhoHangController::class,'nhapHangView'])->name('ds-nhaphang-view');
    Route::get('admin/nhap-moi-san-pham-view',[KhoHangController::class,'themSPhamView'])->name('themSPham-view');
    Route::get('admin/xem-nhap-hang/{id}',[KhoHangController::class,'chiTietNhapHangView'])->name('nhapHang-view');
    Route::post('admin/nhap-moi-san-pham',[KhoHangController::class,'nhapMoiSPham'])->name('nhapMoiSPham-add');
        //Ajax
        Route::get('layDsNhapHangAjax',[KhoHangController::class,'layDsNhapHangAjax'])->name('layDsNhapHangAjax');

    // Điều chuyển
    Route::get('admin/danh-sach-dieu-chuyen',[KhoHangController::class,'dsDieuChuyenHangView'])->name('ds-dieuchuyen-view');
    Route::get('admin/dieu-chuyen-san-pham-view',[KhoHangController::class,'dieuChuyenHangView'])->name('dieuChuyen-view');
    Route::get('admin/xem-dieu-chuyen/{mdc}',[KhoHangController::class,'chiTietDieuChuyenView'])->name('chiTietDieuChuyenView');
    Route::post('admin/dieu-chuyen-hang',[KhoHangController::class,'dieuChuyenHang'])->name('dieuchuyenhang');
    Route::post('admin/xac-nhan-dieu-chuyen/{mdc}',[KhoHangController::class,'xacNhanDieuChuyen'])->name('xacNhanDieuChuyen');
    Route::post('admin/huy-dieu-chuyen/{mdc}',[KhoHangController::class,'huyDieuChuyen'])->name('huyDieuChuyen');
        //Ajax
        Route::get('layDsDieuChuyenAjax',[KhoHangController::class,'layDsDieuChuyenAjax'])->name('layDsDieuChuyenAjax');
        Route::get('tatCaSanPhamModal/{mcn}',[KhoHangController::class,'dsSanPhamModal'])->name('tatCaSanPhamModal');
    // Nhập tồn kho
    Route::get('admin/danh-sach-nhap-kho',[KhoHangController::class,'dsNhapKhoHangView'])->name('ds-nhapkho-view');
    Route::get('admin/nhap-kho-san-pham-view',[KhoHangController::class,'nhapKhoHangView'])->name('nhapKhoView');
    Route::get('admin/xem-nhap-kho/{id}',[KhoHangController::class,'chiTietNhapKhoView'])->name('nhapKho-view');
    Route::post('admin/nhap-kho-san-pham',[KhoHangController::class,'nhapKhoSanPham'])->name('nhapKhoSanPham');
        //Ajax
        Route::get('layDsNhapKhoAjax',[KhoHangController::class,'layDsNhapKhoAjax'])->name('layDsNhapKhoAjax');

    // Xuất kho
    Route::get('admin/danh-sach-xuat-kho',[KhoHangController::class,'dsXuatKhoView'])->name('ds-xuatkho-view');
    Route::get('admin/xuat-kho-san-pham-view',[KhoHangController::class,'xuatKhoView'])->name('xuatKhoView');
    Route::get('admin/xem-xuat-kho/{id}',[KhoHangController::class,'chiTietXuatKhoView'])->name('chiTietXuatKhoView');
    Route::post('admin/xuat-kho-san-pham',[KhoHangController::class,'xuatKho'])->name('xuatKhoSanPham');
        //Ajax
        Route::get('layDsXuatKhoAjax',[KhoHangController::class,'layDsXuatKhoAjax'])->name('layDsXuatKhoAjax');


//Quản Lý bán hàng
    //CRUD Đơn hàng
    Route::get('admin/ban-hang/danh-sach-don-hang-view',[BanHangController::class,'dSDonHangView'])->name('ds-donhang-view');
    Route::get('admin/ban-hang/tao-don-hang-view',[BanHangController::class,'taoDonHangView'])->name('taoDonhangView');
    Route::get('admin/ban-hang/cap-nhat-don-hang/{mdh}',[BanHangController::class,'loadChiTietDonHang'])->name('capNhatDonhangView');
    Route::get('admin/ban-hang/chi-tiet-don-hang/{mdh}',[BanHangController::class,'xemChiTietDonHang'])->name('chiTietDonhangView');
    Route::get('admin/ban-hang/xoa-don-hang',[BanHangController::class,'xoaDonHang'])->name('xoadonhang-del');
    Route::post('admin/ban-hang/tao-don-hang',[BanHangController::class,'taoDonHang'])->name('taodonhang-add');
    Route::post('admin/ban-hang/sua-don-hang',[BanHangController::class,'suaDonHang'])->name('suadonhang-upd');
    Route::post('admin/ban-hang/xac-nhan-don-hang/{mdh}',[BanHangController::class,'xacNhanDonHang'])->name('xacNhanDonHang');
    Route::post('admin/ban-hang/huy-don-hang/{mdh}',[BanHangController::class,'huyDonHang'])->name('huyDonHang');
    Route::post('admin/ban-hang/van-chuyen-don-hang/{mdh}',[BanHangController::class,'vanChuyenDonHang'])->name('vanChuyenDonHang');
    //Ajax
    Route::get('layDsDonHangAjax',[BanHangController::class,'layDsDonHangAjax'])->name('layDsDonHangAjax');
    Route::get('chitiet-sanpham-theo-msp/{listmsp}',[BanHangController::class,'layChiTietTheoSanPhamDH'])->name('layChiTietTheoSanPhamDHModal');

//Báo cáo thống kê
Route::get('admin/bao-cao-ton-kho',[ThongKeController::class,'loadDSTonKho'])->name('baocao-tonkho-view');
Route::get('admin/bao-cao-doanh-thu',[ThongKeController::class,'loadDSDoanhThu'])->name('baocao-doanhthu-view');
Route::get('admin/bao-cao-san-pham-ban-chay',[ThongKeController::class,'loadSPBanChay'])->name('baocao-sanpham-banchay-view');


//Client
Route::get('/thong-tin-tai-khoan/{id}',[NguoiDungController::class,'loadThongTinClient'])->name('thongtin-client-view');
Route::post('/thong-tin-tai-khoan/{id}',[NguoiDungController::class,'ThongTinClient'])->name('thongtin-client');

Route::get('/doi-mat-khau/{id}',[NguoiDungController::class,'loadMKClient'])->name('doimk-client-view');
Route::post('doi-mat-khau/{id}',[NguoiDungController::class,'doiMKClient'])->name('doimk-client');


Route::get('/danh-sach-yeu-thich',[NguoiDungController::class,'loadSDYeuThich'])->name('danhsach-yeuthich-view');
Route::get('/gio-hang',[GioHangController::class,'loadGioHangView'])->name('giohang-view');
Route::get('/gio-hang/chi-tiet-gio-hang',[GioHangController::class,'loadChiTietGioHang'])->name('chitiet-giohang-view');
Route::get('/gio-hang/chi-tiet-gio-hang/thanh-toan')->name('thanhtoan-view');
Route::get('/chi-tiet-san-pham/{id}',[NguoiDungController::class,'thongTinSanPhamView'])->name('chitiet-sanpham-view');
Route::post('/chi-tiet-san-pham/{id}',[NguoiDungController::class,'thongTinSanPham'])->name('chitiet-sanpham');
Route::get('/loai-san-pham',[SanPhamController::class,'loadSPTheoLoai'])->name('loaisanpham-view');
Route::get('/don-hang',[DonHangController::class,'loadDonHang'])->name('donhang-view');
Route::get('/don-hang/chi-tiet-don-hang',[DonHangController::class,'loadChiTietDonHang'])->name('chitiet-donhang-view');
Route::get('/cua-hang',[NguoiDungController::class,'cuaHangView'])->name('cuahang-view');
Route::get('/gioi-thieu',[NguoiDungController::class,'gioiThieuView'])->name('gioithieu-view');
Route::get('/tin-tuc',[NguoiDungController::class,'tinTucView'])->name('tintuc-view');
Route::get('/xem-tintuc',[NguoiDungController::class,'xemTinTucView'])->name('xemtintuc-view');
Route::get('/lien-he',[NguoiDungController::class,'lienHeView'])->name('lienhe-view');
Route::get('/gio-hang',[NguoiDungController::class,'gioHangView'])->name('giohang-view');
Route::get('/gioi-thieu',[NguoiDungController::class,'gioiThieuView'])->name('gioithieu-view');

//verify email
Route::get('/xac-thuc-email/{id}/{token}',[VerificationController::class,'verifyEmail'])->name('xacthuc-email');
