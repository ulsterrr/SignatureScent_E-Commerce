<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $fillable=['id','MaSanPham','TenSanPham','KichCo','ThuongHieu','SoLuong','GiaTien','TongTien','HinhAnh','LoaiKichCo','GhiChu','NguoiTao','TrangThai'];
}
