<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{
    public function thongTinSanPhamView($id) {
        $sanpham = SanPham::where('MaSanPham',$id)->first();
        $LoaiSanPham = $sanpham->LoaiSanPham;

        $sanphamtuongtu = SanPham::where('LoaiSanPham',$LoaiSanPham)->get();
        return view('nguoi-dung.xem-sanpham')->with([
            'SanPham' => $sanpham,
            'SanPhamTT' => $sanphamtuongtu]);
    }
    // public function thongTinSanPham($id){

    //     return view('nguoi-dung.xem-sanpham')->with('SanPham',$sanpham);
    // }
    public function cuaHangView() {
        return view('nguoi-dung.cua-hang');
    }

    public function gioiThieuView() {
        return view('nguoi-dung.gioi-thieu');
    }

    public function lienHeView() {
        return view('nguoi-dung.lien-he');
    }

    public function tinTucView() {
        return view('nguoi-dung.tin-tuc');
    }

    public function xemTinTucView() {
        return view('nguoi-dung.xem-tintuc');
    }

    public function gioHangView() {
        if(Auth::check()) {
            $emails = auth()->user()->email;
            $gioHang = GioHang::where([['NguoiTao',$emails]])->get();
            return view('nguoi-dung.gio-hang')->with(['gioHang' => $gioHang]);
        }
        else {
            return redirect()->route('dang-nhap');
        }
    }

    public function layDuLieuGioHang() {
        if(Auth::check()) {
            $gioHang = GioHang::where('NguoiTao',Auth::user()->email)->get();
            $html = view('layouts.webpage.gio-hang-reload')->with([
                'gioHang' => $gioHang
            ])->render();
            return response()->json(['html' => $html]);
        }
    }
    public function themVaoGioHang(Request $request) {
        if(!Auth::check()) {
            return response()->json(['success' => false]);
        }
        $maSP = $request->MaSanPham;
        $SL = $request->SoLuong;
        $gioHangHienTai = GioHang::where([
            'MaSanPham' => $maSP,
            'NguoiTao' => Auth::user()->email
        ])->first();

        if($gioHangHienTai && $gioHangHienTai->count() > 0) {
            $gioHangHienTai->SoLuong += $SL;
            $gioHangHienTai->TongTien = $gioHangHienTai->SoLuong*$gioHangHienTai->GiaTien; //
            $gioHangHienTai->save();
        } else {
        $sp = SanPham::where('MaSanPham', $maSP)->first();
        // Thêm sản phẩm vào giỏ hàng
        $gioHang = new GioHang();
        $gioHang->MaSanPham = $maSP;
        $gioHang->TenSanPham = $sp->TenSanPham;
        $gioHang->KichCo = $sp->KichCo;
        $gioHang->ThuongHieu = $sp->ThuongHieu;
        $gioHang->GiaTien = $sp->GiaTien;
        $gioHang->TongTien = $sp->GiaTien * $SL;
        $gioHang->HinhAnh = $sp->HinhAnh;
        $gioHang->LoaiKichCo = $sp->LoaiKichCo;
        $gioHang->GhiChu = $sp->GhiChu;
        $gioHang->NguoiTao = Auth::user()->email;
        $gioHang->TrangThai = 0;
        $gioHang->SoLuong = $SL;
        $gioHang->save();
        }
        // Trả về kết quả cho Ajax
        return response()->json(['success' => true]);
    }
}
