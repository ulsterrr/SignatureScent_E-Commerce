<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $fillable=['MaSanPham','TenSanPham','ThuongHieu','TrangThai','GiaTien','MoTa','HinhAnh','LoaiKichCo','LoaiSanPham','GhiChu','NguoiTao'];
}
