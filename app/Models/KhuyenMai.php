<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $fillable=['MaKhuyenMai','NoiDung','TrangThai','SoLuong','NguoiTao'];
}
