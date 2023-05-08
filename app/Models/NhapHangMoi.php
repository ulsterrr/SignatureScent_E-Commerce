<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapHangMoi extends Model
{
    use HasFactory;
    protected $table = 'nhap_hang_mois';
    protected $fillable=['MaSanPham','TenSanPham','KichCo','ThuongHieu','SoLuongNhap','SoSerial','SoLuongSerial','LoaiNhap','VAT','GiaVAT','GiaTien','GiaTienSauThue','TongTien','MoTa','HinhAnh','LoaiSanPham','LoaiKichCo','MaKhoHang','MaChiNhanh','GhiChu','NguoiTao'];
}
