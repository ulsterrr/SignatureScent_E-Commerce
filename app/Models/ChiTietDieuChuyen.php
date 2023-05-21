<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDieuChuyen extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_dieu_chuyens';
    protected $fillable=['MaPhieuDieuChuyen','MaCTDieuChuyen','MaSanPham','MaCTSanPham','TrangThaiHienTai','GhiChu'];

    // Lấy thông tin sản phẩm
    public function getSanPham(){
        return $this->hasOne('App\Models\SanPham','MaSanPham','MaSanPham');
    }
    // Lấy thông tin chi tiết sản phẩm
    public function getCTSanPham(){
        return $this->hasOne('App\Models\ChiTietSanPham','MaCTSanPham','MaCTSanPham');
    }
}
