<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuatKho extends Model
{
    use HasFactory;
    protected $table = 'xuat_khos';
    protected $fillable=['MaXuatKho','LyDoXuat','ChiNhanhNhan','TrangThai','NgayXuat','NguoiXuatKho'];

    // Lấy thông tin chi nhánh nhận
    public function getChiNhanh(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','ChiNhanhNhan');
    }
    // Lấy thông tin người xuất kho
    public function getUserXuatKho(){
        return $this->hasOne('App\Models\User','email','NguoiXuatKho');
    }

    // lấy chi tiết xuất kho
    public function chiTietXuatKho()
    {
        return $this->hasMany('App\Models\ChiTietXuatKho', 'MaXuatKho', 'MaXuatKho');
    }

    public static function layThongTinXuatKho($mpx){
        return XuatKho::with('chiTietXuatKho', 'chiTietXuatKho.getSanPham', 'chiTietXuatKho.getCTSanPham', 'getChiNhanh', 'getUserXuatKho')->where('MaXuatKho',$mpx)->firstOrFail();
    }
}
