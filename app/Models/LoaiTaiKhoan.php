<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'loai_tai_khoans';
    protected $fillable=['MaLoai','TenLoai','GhiChu','NguoiTao'];

    public function taiKhoan() {
        return $this->hasMany(User::class,'LoaiTaiKhoan','MaLoai');
    }

    public function phanQuyen()
    {
        return $this->hasMany(PhanQuyen::class,'LoaiTaiKhoan','MaLoai')->where('TrangThai', 1);
    }

    public function phanQuyenTheoLoai($ml)
    {
        return $this->hasMany(PhanQuyen::class,'LoaiTaiKhoan','MaLoai');
    }
}
