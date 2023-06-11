<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hangs';
    protected $fillable=['MaDonHang','Email','HoTen','DiaChi','SDT','TinhThanh','QuanHuyen','GhiChu','MaKhuyenMai','LoaiThanhToan','VanChuyen','PhiVanChuyen','TongTien','ChiNhanh','NguoiTao','MaGioHang','TrangThai'];

    // Lấy thông tin chi nhánh
    public function getChiNhanh(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','ChiNhanh');
    }
    // Lấy thông tin người điểu chuyển
    public function getUserTao(){
        return $this->hasOne('App\Models\User','email','NguoiTao');
    }

    public function chiTietDonHang(){
        return $this->hasMany(ChiTietDonHang::class, 'MaDonHang', 'MaDonHang');
    }

    public function chiTietSanPhamDH(){
        return $this->hasMany(ChiTietSanPham::class, 'MaDonHang', 'MaDonHang');
    }

    public static function layDonHangTheoMa($mhd){
        return DonHang::with('chiTietDonHang', 'chiTietDonHang.thongTinSanPham','chiTietDonHang.thongTinSanPham.loaiKichCo',
                             'chiTietDonHang.thongTinSanPham.loaiSanPham')->where('MaDonHang',$mhd)->first();
    }

    public static function chiTietSanPhamDHTheoMa($mhd){
        return DonHang::with('chiTietDonHang', 'chiTietSanPhamDH','chiTietSanPhamDH.chiTietCuaSanPham.loaiKichCo',
                             'chiTietSanPhamDH.chiTietCuaSanPham.loaiSanPham')->where('MaDonHang',$mhd)->first();
    }
}
