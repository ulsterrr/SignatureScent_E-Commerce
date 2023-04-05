<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKhoHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_kho_hangs';
    protected $fillable=['MaKhoHang','MaSanPham','TenSanPham','SoLuong'];
}
