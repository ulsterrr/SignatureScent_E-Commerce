<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LoaiSanPham;
use Yajra\DataTables\DataTables;

class LoaiSanPhamController extends Controller
{
    public function loadLoaiSPView(){
        $loaisanpham = LoaiSanPham::all();
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp')->with('loaisanpham',$loaisanpham);
    }
    public function themLoaiSPhamView(){
        return view('');
    }
    public function themLoaiSPham(Request $req){
        $loaisanpham = new LoaiSanPham();
        $loaisanpham->MaLoai = $req->MaLoai;
        $loaisanpham->TenLoai = $req->TenLoai;
        $loaisanpham->GhiChu = $req->GhiChu;
        $loaisanpham->NguoiTao = auth()->user()->email;
        $loaisanpham->save();
        session()->flash('message','Thêm loại sản phẩm thành công!');
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp');

    }

    public function chiTietLoaiSPhamView($id){
        $loaisanpham = LoaiSanPham::find($id);
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp',compact('loaisanpham'));

    }

    public function capNhatLoaiSPhamView($id){
        $loaisanpham = LoaiSanPham::find($id);
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp',compact('loaisanpham'));
    }
    public function capNhatLoaiSPham(Request $req, $id){
        $loaisanpham = LoaiSanPham::findOrFail($id);
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
    public function xoaLoaiSPham($id){
        $loaisanpham = LoaiSanPham::find($id);
        $loaisanpham->delete();
        return view('he-thong.kho-hang.loai-san-pham.ds-loai-sp');
    }

    public function layLoaiSPAjax()
    {
        $lsp = LoaiSanPham::all();
        return DataTables::of($lsp)->make(true);
    }

}
