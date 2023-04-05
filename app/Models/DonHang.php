<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'don_hangs';
    protected $fillable=['MaDonHang','Email','HoTen','DiaChi','SDT','TinhThanh','QuanHuyen','GhiChu','MaKhuyenMai','LoaiThanhToan','VanChuyen','ChiNhanh','NguoiTao','MaGioHang'];
}
