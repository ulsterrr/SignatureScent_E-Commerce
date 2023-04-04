<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieuChuyen extends Model
{
    use HasFactory;
    protected $table = 'dieu_chuyens';
    protected $fillable=['LyDoDieuChuyen','ChiNhanhHienTai','ChiNhanhDieuChuyen','MaSanPham','MaChiTietSP','NgayDieuChuyen','NguoiDieuChuyen'];
}
