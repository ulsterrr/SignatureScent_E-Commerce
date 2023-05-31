<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    use HasFactory;
    protected $table = 'nhap_khos';
    protected $fillable=['MaNhapKho','MaSanPham','MaChiNhanh','SoSerial','SoLuongNhap','KichCo','TongTien','GhiChu','NguoiTao','MaKhoHang'];

    public function getChiNhanh(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','MaChiNhanh');
    }

    public function sanPhamNhap(){
        return $this->hasOne('App\Models\SanPham','MaSanPham','MaSanPham');
    }

    // Lấy thông tin nhập mới sản phẩm
    public static function layThongTinNhapKho($maphieunhap){
        return NhapKho::with('getChiNhanh', 'sanPhamNhap', 'sanPhamNhap.loaiSanPham', 'sanPhamNhap.loaiKichCo')->where('MaNhapKho',$maphieunhap)->firstOrFail();
    }
}
