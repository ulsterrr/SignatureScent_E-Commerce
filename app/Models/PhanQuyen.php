<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use HasFactory;
    protected $table = 'phan_quyens';
    protected $fillable=['MaQuyen','TenQuyen','LoaiTaiKhoan','URL','TrangThai','NguoiTao'];

    public function loaiTaiKhoan()
    {
        return $this->belongsTo(LoaiTaiKhoan::class);
    }
}
