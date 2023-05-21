<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieuChuyen extends Model
{
    use HasFactory;
    protected $table = 'dieu_chuyens';
    protected $fillable=['MaPhieuDieuChuyen','LyDoDieuChuyen','ChiNhanhHienTai','ChiNhanhDieuChuyen','TrangThai','NgayDieuChuyen','NguoiDieuChuyen'];

    // Lấy thông tin chi nhánh của bên A
    public function getChiNhanhA(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','ChiNhanhHienTai');
    }

    // Lấy thông tin chi nhánh của bên B
    public function getChiNhanhB(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','ChiNhanhDieuChuyen');
    }
    // Lấy thông tin người điểu chuyển
    public function getUserDieuChuyen(){
        return $this->hasOne('App\Models\User','email','NguoiDieuChuyen');
    }

    // lấy chi tiết điều chuyển
    public function chiTietDieuChuyen()
    {
        return $this->hasMany('App\Models\ChiTietDieuChuyen', 'MaPhieuDieuChuyen', 'MaPhieuDieuChuyen');
    }

    public static function layThongTinDieuChuyen($maphieudc){
        return DieuChuyen::with('chiTietDieuChuyen', 'chiTietDieuChuyen.getSanPham', 'chiTietDieuChuyen.getCTSanPham', 'getChiNhanhA', 'getChiNhanhB', 'getUserDieuChuyen')->where('MaPhieuDieuChuyen',$maphieudc)->firstOrFail();
    }
}
