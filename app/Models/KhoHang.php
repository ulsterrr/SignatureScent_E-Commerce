<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    protected $fillable=['TenKho','ChiNhanh','NguoiQuanLy','ThoiGian','GiaTien','TrangThai'];
}
