<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hangs';
    protected $fillable=['MaDonHang','SoLuong','GiaTien','TongTien','TenSanPham','MaSanPham'];
}
