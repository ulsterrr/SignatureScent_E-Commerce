<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    protected $fillable=['id','MaSanPham','SoSerial','MaChiNhanh','TinhTrang','GhiChu','NguoiTao','MaDonHang','MaPhieuNhap'];
}
