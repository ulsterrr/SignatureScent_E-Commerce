<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    protected $fillable=['id','TenSanPham','MaSanPham','NguoiThich','TrangThai'];
}
