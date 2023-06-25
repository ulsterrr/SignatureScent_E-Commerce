<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'khuyen_mais';
    protected $fillable=['MaKhuyenMai','NoiDung','TrangThai','GiaTri','SoLuong','NguoiTao'];
}
