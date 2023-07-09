<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable=['MaSanPham','TenSanPham','ThuongHieu','TrangThai','VAT','GiaVAT','GiaTien','MoTa','HinhAnh','LoaiKichCo','LoaiSanPham','GhiChu','NguoiTao','SoLuong'];

    // Khoá ngoại loại sản phẩm
    public function loaiSanPham()
    {
        return $this->belongsTo('App\Models\LoaiSanPham', 'LoaiSanPham', 'MaLoai');
    }

    // Khoá ngoại loại kích cỡ
    public function loaiKichCo()
    {
        return $this->belongsTo('App\Models\LoaiKichCo', 'LoaiKichCo', 'MaKichCo');
    }

    public function chiTietSanPhams()
    {
        return $this->hasMany('App\Models\ChiTietSanPham', 'MaSanPham', 'MaSanPham');
    }

    // Khoá ngoại liên kết lấy tất cả sản phẩm và các bảng liên quan
    public static function getTatCaSanPham(){
        return SanPham::with('loaiSanPham', 'loaiKichCo')->orderBy('MaSanPham','desc')->get();
    }

    public function laySoLuongChiTiet()
    {
        return ChiTietSanPham::where('MaSanPham', $this->MaSanPham)->count();
    }

}
