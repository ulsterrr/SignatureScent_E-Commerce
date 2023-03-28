<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoDich extends Model
{
    protected $fillable=['id','MaGiaoDich','MaSanPham','ChucNang','NoiDung','TrangThai','SoLuong'];
}
