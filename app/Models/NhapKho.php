<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    protected $fillable=['id','MaSanPham','MaChiNhanh','SoLuongNhap','GhiChu','NguoiTao','MaKhoHang'];
}
