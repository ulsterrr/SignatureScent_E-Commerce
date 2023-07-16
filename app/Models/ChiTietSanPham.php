<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_san_phams';
    protected $fillable=['MaCTSanPham','MaSanPham','SoSerial','KichCo','GiaTien','MaChiNhanh','TinhTrang','GhiChu','NguoiTao','MaDonHang','MaPhieuNhap'];

    // Thuộc sản phẩm
    public function chiTietCuaSanPham()
    {
        return $this->belongsTo('App\Models\SanPham', 'MaSanPham', 'MaSanPham');
    }

    // Điếm số lượng sản phẩm hiện có
    public static function soLuongSanPhamTonKho(){
        $data=ChiTietSanPham::where('TinhTrang', 0)->count();
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
    // chi tiết sản phẩm thuộc phiếu nhập
    public static function nhapHang($mph) {
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh')->where('MaPhieuNhap',$mph)->get();
    }

    // chi tiết sản phẩm thuộc đơn hàng
    public static function donHang($mdh) {
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh')->where('MaDonHang',$mdh)->get();
    }

    public static function layChiTietVaSanPham(){
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh');
    }

    public static function layChiTietVaSanPhamTheoCN($mcn){
        if($mcn == 'TatCaChiNhanh'){
            return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh');
        }
        if($mcn == 'TrongKho'){
            return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh')->whereNull('MaChiNhanh')->orWhere('MaChiNhanh', '')->get();
        }
        return ChiTietSanPham::with('chiTietCuaSanPham','chiTietCuaSanPham.loaiKichCo','chiTietCuaSanPham.loaiSanPham', 'getChiNhanh')->where('MaChiNhanh', $mcn);
    }

    // Lấy các chi tiết trong list sản phẩm đã chọn của đơn hàng
    public static function layChiTietTheoSanPhamDH($listMSP){
        $listMSP = explode(",", $listMSP); // Đẩy ra thành dạng mảng để thực hiện where in cho MySQL
        return ChiTietSanPham::with('chiTietCuaSanPham', 'chiTietCuaSanPham.loaiKichCo', 'chiTietCuaSanPham.loaiSanPham')
                            ->whereIn('MaSanPham', $listMSP)
                            ->whereNull('MaDonHang')
                            // ->orWhere('MaDonHang', '')
                            ->get();
    }
}
