<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $fillable=['MaSanPham','TenSanPham','KichCo','ThuongHieu','SoLuong','GiaTien','TongTien','HinhAnh','LoaiKichCo','GhiChu','NguoiTao','TrangThai'];

    public function TaiKhoan(){
        return $this->belongsTo('App\Models\TaiKhoan','NguoiTao','TenTaiKhoan');
    }
}
