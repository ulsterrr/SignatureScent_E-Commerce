<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapHangMoi extends Model
{
    protected $fillable=['id','TenSanPham','KichCo','ThuongHieu','SoLuongNhap','LoaiNhap','GiaTien','MoTa','HinhAnh','LoaiSanPham','LoaiKichCo','MaKhoHang','MaChiNhanh','GhiChu','NguoiTao'];
}
