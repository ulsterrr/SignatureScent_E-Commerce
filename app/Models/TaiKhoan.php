<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $fillable=['id','TenTaiKhoan','LoaiNguoiDung','HoTen','MatKhau','GioiTinh','DiaChi','SDT','QuanHuyen','TinhThanh','ChiNhanh','NgaySinh','TrangThai','NguoiTao','Xoa','MaGiaoDien'];
}
