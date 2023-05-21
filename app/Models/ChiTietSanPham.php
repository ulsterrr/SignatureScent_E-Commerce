<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_san_phams';
    protected $fillable=['MaCTSanPham','MaSanPham','SoSerial','KichCo','MaChiNhanh','TinhTrang','GhiChu','NguoiTao','MaDonHang','MaPhieuNhap'];

    // Thuộc sản phẩm
    public function chiTietCuaSanPham()
    {
        return $this->belongsTo('App\Models\SanPham', 'MaSanPham', 'MaSanPham');
    }

    // Điếm số lượng sản phẩm hiện có
    public static function soLuongSanPhamTonKho(){
        $data=ChiTietSanPham::where('TinhTrang', 1)->count();
        if($data){
            return $data;
        }
        return 0;
    }
    // Lấy thông tin chi nhánh của CT SP
    public function getChiNhanh(){
        return $this->hasOne('App\Models\ChiNhanh','MaChiNhanh','MaChiNhanh');
    }
    //
    public static function layChiTiettheoSanPham($masanpham){
        return ChiTietSanPham::with('chiTietCuaSanPham.loaiKichCo', 'getChiNhanh')->where('MaSanPham',$masanpham);
    }

    // chi tiết sản phẩm thuộc giỏ hàng, đơn hàng
    public function gioHang()
    {
        return $this->belongsTo(GioHang::class, 'id');
    }
    // chi tiết sản phẩm thuộc đơn hàng
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'MaDonHang');
    }

    public static function layChiTietVaSanPham(){
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh');
    }

    public static function layChiTietVaSanPhamTheoCN($mcn){
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh')->where('MaChiNhanh', $mcn);
    }
}
