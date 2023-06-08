<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hangs';
    protected $fillable=['MaDonHang','Email','HoTen','DiaChi','SDT','TinhThanh','QuanHuyen','GhiChu','MaKhuyenMai','LoaiThanhToan','VanChuyen','PhiVanChuyen','TongTien','ChiNhanh','NguoiTao','MaGioHang','TrangThai'];

    public function chiTietDonHang(){
        return $this->hasMany(ChiTietDonHang::class, 'MaDonHang', 'MaDonHang');
    }

    public function chiTietSanPhamDH(){
        return $this->hasMany(ChiTietSanPham::class, 'MaDonHang', 'MaDonHang');
    }

    public function layDonHangTheoMa($mhd){
        return DonHang::with('chiTietDonHang', 'chiTietSanPhamDH', 'chiTietSanPhamDH.chiTietCuaSanPham','chiTietSanPhamDH.chiTietCuaSanPham.loaiKichCo',
                             'chiTietSanPhamDH.chiTietCuaSanPham.loaiSanPham')->where('MaDonHang',$mhd)->first();
    }
}
