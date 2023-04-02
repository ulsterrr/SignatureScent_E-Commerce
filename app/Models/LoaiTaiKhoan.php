<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    protected $fillable=['MaLoai','TenLoai','GhiChu','NguoiTao'];

    public function taiKhoan() {
        return $this->hasMany('App\Models\TaiKhoan','LoaiTaiKhoan','MaLoai');
    }
}
