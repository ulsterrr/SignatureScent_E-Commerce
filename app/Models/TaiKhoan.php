<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $fillable=['TenTaiKhoan','LoaiTaiKhoan','HoTen','MatKhau','GioiTinh','DiaChi','SDT','QuanHuyen','TinhThanh','ChiNhanh','NgaySinh','TrangThai','NguoiTao','Xoa','MaGiaoDien'];

    // Khoá ngoại đến bảng LoaiTaiKhoan
    public function loaiTaiKhoan(){
        return $this->hasOne('App\Models\LoaiTaiKhoan','MaLoai','LoaiTaiKhoan');
    }

}

