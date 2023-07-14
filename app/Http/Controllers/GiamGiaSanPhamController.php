<?php

namespace App\Http\Controllers;

use App\Models\GiamGiaSanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class GiamGiaSanPhamController extends Controller
{
    public function loadLoaiSPView(){
        $loaisanpham = GiamGiaSanPham::all();
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp')->with('loaisanpham',$loaisanpham);
    }

    public function themGiamGia(Request $req){
        $loaisanpham = new GiamGiaSanPham();
        $loaisanpham->MaLoai = $req->MaLoai;
        $loaisanpham->TenLoai = $req->TenLoai;
        $loaisanpham->GhiChu = $req->GhiChu;
        $loaisanpham->NguoiTao = auth()->user()->email;
        $loaisanpham->save();
        session()->flash('message','Thêm loại sản phẩm thành công!');
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp');

    }

    public function capNhatGiamGia(Request $req, $id){
        $loaisanpham = GiamGiaSanPham::findOrFail($id);
        $loaisanpham->MaLoai = $req->MaLoai;
        $loaisanpham->TenLoai = $req->TenLoai;
        $loaisanpham->GhiChu = $req->GhiChu;
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $loaisanpham->updated_at = $dt;
        $loaisanpham->save();
        session()->flash('message','Cập nhật loại sản phẩm thành công!');
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp');
    }
    public function xoaGiamGia($id){
        $loaisanpham = GiamGiaSanPham::find($id);
        $loaisanpham->delete();
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp');
    }

    public function laydsGiamGiaAjax()
    {
        $lsp = GiamGiaSanPham::all();
        return DataTables::of($lsp)->make(true);
    }

}
