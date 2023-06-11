<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_don_hangs';
    protected $fillable=['MaCTDonHang','MaDonHang','MaSanPham','Soluong','GiaTien','TongTien'];

    public function thongTinSanPham()
    {
        return $this->belongsTo('App\Models\SanPham', 'MaSanPham', 'MaSanPham');
    }
}
