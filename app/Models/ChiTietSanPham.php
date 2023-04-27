<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_san_phams';
    protected $fillable=['MaCTSanPham','MaSanPham','SoSerial','MaChiNhanh','TinhTrang','GhiChu','NguoiTao','MaDonHang','MaPhieuNhap'];

    // Thuộc sản phẩm
    public function chiTietcuaSanPham()
    {
        return $this->belongsTo('App\Models\SanPham', 'MaSanPham', 'MaSanPham');
    }

    // Điếm số lượng sản phẩm hiện có
    public static function soLuongSanPhamTonKho(){
        $data=SanPham::where('TinhTrang','stock')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    //
    public static function layChiTiettheoSanPham($masanpham){
        return SanPham::with('chiTietcuaSanPham')->where('MaSanPham',$masanpham)->first();
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

}
