<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    use HasFactory;
    protected $table = 'nhap_khos';
    protected $fillable=['MaNhapKho','MaSanPham','MaChiNhanh','SoSerial','SoLuongNhap','GhiChu','NguoiTao','MaKhoHang'];
}
