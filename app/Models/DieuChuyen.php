<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieuChuyen extends Model
{
    protected $fillable=['id','LyDoDieuChuyen','ChiNhanhHienTai','ChiNhanhDieuChuyen','MaSanPham','MaChiTietSP','NgayDieuChuyen','NguoiDieuChuyen'];
}