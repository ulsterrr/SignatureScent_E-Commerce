<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $fillable=['MaHoaDon','MaDonHang','SoLuong','GiaTien','TongTien','TenSanPham','NguoiTao'];

    public function thongTinDonHang(){
        return $this->hasMany('App\Models\DonHang','MaDonHang','MaDonHang');
    }
    public static function layHoaDonId($id){
        return DonHang::with('thongTinDonHang')->find($id);
    }
    //Liên kết bảng giỏ hàng
    public function taiKhoan(){
        return $this->belongsTo('App\Models\TaiKhoan', 'TenTaiKhoan','NguoiTao');
    }
    //Liên kết bảng đơn hàng
    public function donHang(){
        return $this->belongsTo('App\Models\DonHang', 'MaDonHang','MaDonHang');
    }
}
