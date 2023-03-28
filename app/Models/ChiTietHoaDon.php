<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $fillable=['id','MaHoaDon','MaSanPham','SoLuong','GiaTien','TongTien','TenSanPham','SoSerial'];
}
