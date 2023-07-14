<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGiaSanPham extends Model
{
    use HasFactory;
    protected $table = 'loai_san_phams';
    protected $fillable=['MaSanPham','PhanTramGiam','TrangThai','NguoiTao'];

}
