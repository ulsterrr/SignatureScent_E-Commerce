<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    use HasFactory;
    protected $table = 'kho_hangs';
    protected $fillable=['TenKho','ChiNhanh','NguoiQuanLy','ThoiGian','GiaTien','TrangThai'];
}
