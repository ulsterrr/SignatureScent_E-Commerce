<?php

namespace App\Http\Controllers;

use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SanPhamController extends Controller
{
    //Xử lý hàm sp dành cho admin
    public function loadSPView(){
        $sanpham = SanPham::all();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.danh-muc.san-pham.ds-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }
    public function themSPhamView(){
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.danh-muc.san-pham.them-sanpham')->with([
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);;
    }
    public function themSPham(Request $req){
        $sanpham = new SanPham();
        // $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->MaSanPham = SanPhamController::taoMaSanPham();
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req ->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req ->MoTa;
        $sanpham->HinhAnh = $req ->HinhAnh;
        $sanpham->LoaiKichCo = $req ->LoaiKichCo;
        $sanpham->LoaiSanPham = $req ->LoaiSanPham;
        $sanpham->GhiChu = $req ->GhiChu;
        $sanpham->NguoiTao = $req ->NguoiTao;
        session()->flash('message','Thêm sản phẩm thành công!');
    }

    public function chiTietSPhamView($id){
        $sanpham = SanPham::find($id);
        return view('he-thong.danh-muc.san-pham.sanpham-details',compact('SanPham'));

    }

    public function capNhatSPhamView($id){
        $sanpham = SanPham::find($id);
        return view('he-thong.danh-muc.san-pham.capnhat-sanpham',compact('SanPham'));
    }
    public function capNhatSPham(Request $req, $id){
        $sanpham = SanPham::findOrFail($id);
        $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req ->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req ->MoTa;
        $sanpham->HinhAnh = $req ->HinhAnh;
        $sanpham->LoaiKichCo = $req ->LoaiKichCo;
        $sanpham->LoaiSanPham = $req ->LoaiSanPham;
        $sanpham->GhiChu = $req ->GhiChu;
        $sanpham->NguoiTao = $req ->NguoiTao;
        session()->flash('message','Cập nhật sản phẩm thành công!');
    }
    public function xoaSPham($id){
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect()->route("quanlySPView");
    }

    //Xử lý hàm sản phẩm cho client
    public function loadSDYeuThich(){

    }
    public function loadChiTietSP(){

    }
    public function loadSPTheoLoai(){

    }

    public function layDsSanPhamAjax()
    {
        $sp = SanPham::getTatCaSanPham();
        return DataTables::of($sp)->make(true);
    }

    public static function taoMaSanPham(){
        DB::select('CALL sp_KhoiTaoKyHieu(?, @p_code)', ['SP']);
        $code = DB::select('SELECT @p_code AS code')[0]->code;
        return $code;
    }
}
