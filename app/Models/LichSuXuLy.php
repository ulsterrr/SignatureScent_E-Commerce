<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuXuLy extends Model
{
    use HasFactory;
    protected $table = 'lich_su_xu_lys';
    protected $fillable=['NoiDung','TaiKhoan','ChucNang','ThoiGian','ThuMuc','TrangThai'];
}
