<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $fillable=['MaHoaDon','MaDonHang','SoLuong','GiaTien','TongTien','TenSanPham','NguoiTao','MaDonHang'];
}
