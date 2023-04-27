<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable=['MaSanPham','TenSanPham','ThuongHieu','TrangThai','GiaTien','MoTa','HinhAnh','LoaiKichCo','LoaiSanPham','GhiChu','NguoiTao'];

    // Khoá ngoại loại sản phẩm
    public function loaisanpham(){
        return $this->hasOne('App\Models\LoaiSanPham','LoaiSanPham','MaLoai');
    }
    public function chiTietSanPhams()
    {
        return $this->hasMany('App\Models\ChiTietSanPham', 'MaSanPham', 'MaSanPham');
    }

    // Khoá ngoại liên kết lấy tất cả sản phẩm và các bảng liên quan
    public static function getTatCaSanPham(){
        return SanPham::with('loaisanpham')->orderBy('MaSanPham','desc');
    }
}
