<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NguoiDungController extends Controller
{
    public function thongTinSanPhamView($id) {
        $sanpham = SanPham::find($id);
        $LoaiSanPham = $sanpham->LoaiSanPham;
        $sanphamtuongtu = SanPham::where('LoaiSanPham',$LoaiSanPham)->get();

        $ctsp = ChiTietSanPham::select('MaChiNhanh',DB::raw('count("MaCTSanPham") as TonKho'))->where(['MaSanPham' => $sanpham->MaSanPham],['TinhTrang' => 1])->groupBy('MaChiNhanh')->get();
        // dd($ctsp);
        return view('nguoi-dung.xem-sanpham')->with([
            'SanPham' => $sanpham,
            'SanPhamTT' => $sanphamtuongtu,
            'CTSP' => $ctsp
        ]);
    }
    // public function thongTinSanPham($id){

    //     return view('nguoi-dung.xem-sanpham')->with('SanPham',$sanpham);
    // }
    public function cuaHangView(Request $req) {
        $maloai = $req->input('maloai');
        if($maloai==null)
        {
            $sp = SanPham::all();
        }
        else
        {
            $sp = SanPham::where('LoaiSanPham',$maloai)->get();
        }
        $loaisp = LoaiSanPham::all();
        return view('nguoi-dung.cua-hang')->with(['SP'=> $sp,
        'LSP'=> $loaisp ]);
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
}
