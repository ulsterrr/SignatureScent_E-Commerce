<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoiTraSanPham extends Model
{
    use HasFactory;
    protected $table = 'doi_tra_san_phams';
    protected $fillable=['MaDonhang','ChiTietSPHienTai','ChiTietSPDoiMoi','LoaiDoiTra','LyDo','NguoiTao'];

    // Lấy thông tin chi tiết sản phẩm
    public function getCTHienTai(){
        return $this->hasOne('App\Models\ChiTietSanPham','MaCTSanPham','ChiTietSPHienTai');
    }
    public function getCTDoiMoi(){
        return $this->hasOne('App\Models\ChiTietSanPham','MaCTSanPham','ChiTietSPDoiMoi');
    }

    public static function doiTraCuaDonHang($mdh){
        return DoiTraSanPham::with('getCTHienTai','getCTHienTai.chiTietCuaSanPham','getCTHienTai.chiTietCuaSanPham.loaiKichCo'
        ,'getCTDoiMoi','getCTDoiMoi.chiTietCuaSanPham','getCTDoiMoi.chiTietCuaSanPham.loaiKichCo')->where('MaDonHang',$mdh)->get();
    }
    public static function doiTraCuaDonHangBan($mdh){
        return DoiTraSanPham::with('getCTHienTai','getCTHienTai.chiTietCuaSanPham','getCTHienTai.chiTietCuaSanPham.loaiKichCo'
        )->where('MaDonHang',$mdh)->get();
    }
    public static function doiTraCuaDonHangDoi($mdh){
        return DoiTraSanPham::with('getCTDoiMoi','getCTDoiMoi.chiTietCuaSanPham','getCTDoiMoi.chiTietCuaSanPham.loaiKichCo')->where('MaDonHang',$mdh)->get();
    }
}
