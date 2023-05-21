<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapHangMoi extends Model
{
    use HasFactory;
    protected $table = 'nhap_hang_mois';
    protected $fillable=['MaPhieuNhap','TenSanPham','KichCo','ThuongHieu','SoLuongNhap','SoSerial','SoLuongSerial','LoaiNhap','VAT','GiaVAT','GiaTien','GiaTienSauThue','TongTien','MoTa','HinhAnh','LoaiSanPham','LoaiKichCo','MaKhoHang','MaChiNhanh','GhiChu','NguoiTao'];

    // Khoá ngoại loại sản phẩm
    public function loaiSanPham()
    {
        return $this->belongsTo('App\Models\LoaiSanPham', 'LoaiSanPham', 'MaLoai');
    }

    // Khoá ngoại loại kích cỡ
    public function loaiKichCo()
    {
        return $this->belongsTo('App\Models\LoaiKichCo', 'LoaiKichCo', 'MaKichCo');
    }

    // Lấy thông tin chi nhánh của CT SP
    public function getChiNhanh(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','MaChiNhanh');
    }

    // Lấy thông tin nhập mới sản phẩm
    public static function layThongTinNhapMoi($maphieunhap){
        return NhapHangMoi::with('loaiKichCo', 'getChiNhanh', 'loaiSanPham')->where('MaPhieuNhap',$maphieunhap)->firstOrFail();
    }
}
