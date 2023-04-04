<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    use HasFactory;
    protected $table = 'thanh_toans';
    protected $fillable=['MaLoaiThanhToan','TenLoaiThanhToan','NguoiTao','GhiChu'];
}
