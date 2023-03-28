<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiNhanh extends Model
{
    protected $fillable=['MaChiNhanh','TenChiNhanh','DiaChi','TinhThanh','QuanHuyen','SDT1','SDT2','SDT3','FAX','SoTaiKhoan','MoMo','NguoiQuanLy'];
}
