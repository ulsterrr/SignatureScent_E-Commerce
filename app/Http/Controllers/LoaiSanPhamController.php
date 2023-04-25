<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class LoaiSanPhamController extends Controller
{
    public function loadLoaiSPView(){
        $loaisanpham = LoaiSanPham::all();
        return view('')->with('loaisanpham',$loaisanpham);
    }
    public function themLoaiSPhamView(){
        return view('');
    }
    public function themLoaiSPham(Request $req){
        $loaisanpham = new LoaiSanPham();
        $loaisanpham->MaLoai = $req->MaLoai;
        $loaisanpham->TenLoai = $req->TenLoai;
        $loaisanpham->GhiChu = $req->GhiChu;
        $loaisanpham->NguoiTao = $req ->NguoiTao;
        session()->flash('message','Thêm loại sản phẩm thành công!');
        return View("");

    }

    public function chiTietLoaiSPhamView($id){
        $loaisanpham = LoaiSanPham::find($id);
        return view('',compact('loaisanpham'));

    }

    public function capNhatLoaiSPhamView($id){
        $loaisanpham = LoaiSanPham::find($id);
        return view('',compact('loaisanpham'));
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
        return View("");
    }
    public function xoaLoaiSPham($id){
        $loaisanpham = LoaiSanPham::find($id);
        $loaisanpham->delete();
        return redirect()->route("");
    }

}
