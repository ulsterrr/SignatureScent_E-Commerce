<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichXuLy extends Model
{
    protected $fillable=['id','NoiDung','TaiKhoan','ChucNang','ThoiGian','ThuMuc','TrangThai'];
}