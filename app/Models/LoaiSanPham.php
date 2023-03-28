<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $fillable=['MaLoai','TenLoai','GhiChu','NguoiTao'];
}
