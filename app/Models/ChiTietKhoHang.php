<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKhoHang extends Model
{
    protected $fillable=['MaKhoHang','MaSanPham','TenSanPham','SoLuong'];
}
