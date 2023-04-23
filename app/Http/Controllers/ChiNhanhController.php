<?php

namespace App\Http\Controllers;
use App\Models\ChiNhanh;
use App\Models\chi_nhanh;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ChiNhanhController extends Controller
{
    public function loadDSChiNhanhView(){
        $chinhanh = ChiNhanh::all();
        return view('he-thong.danh-muc.chi-nhanh.ds-chinhanh')->with('ChiNhanh',$chinhanh);
    }
    public function themChiNhanh(Request $req){
        $chinhanh = new ChiNhanh();
        $chinhanh->MaChiNhanh = $req->MaChiNhanh;
        $chinhanh->TenChiNhanh = $req->TenChiNhanh;
        $chinhanh-> DiaChi = $req->DiaChi;
        $chinhanh->TinhThanh = $req->TinhThanh;
        $chinhanh->QuanHuyen = $req->QuanHuyen;
        $chinhanh->SDT1 = $req->SDT1;
        $chinhanh->SDT2 = $req->SDT2;
        $chinhanh->SDT3 = $req->SDT3;
        $chinhanh->FAX = $req->FAX;
        $chinhanh->SoTaiKhoan = $req->SoTaiKhoan;
        $chinhanh->MoMo = $req->MoMo;
        $chinhanh->NguoiQuanLy = $req->NguoiQuanLy;
        $chinhanh->save();
        session()->flash('message','Thêm chi nhánh thành công!');
        return redirect()->route('quanlyCN-view');
    }
    public function themChiNhanhView(){

        return view('he-thong.danh-muc.chi-nhanh.them-chinhanh');
    }
    public function chiTietChiNhanhView(){
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }
    public function chiTietChiNhanh($id){
        $chinhanh = ChiNhanh::find($id);
        return view('he-thong.danh-muc.chi-nhanh.chinhanh-details');
    }
    public function capNhatChiNhanhView($id)
    {
        $chinhanh = ChiNhanh::find($id);
        return view('he-thong.danh-muc.chi-nhanh.capnhat-chinhanh',compact('chinhanh'));
    }
    public function capNhatChiNhanh(Request $req,$id){
        $chinhanh = ChiNhanh::findOrFail($id);
        $chinhanh->TenChiNhanh = $req->TenChiNhanh;
        $chinhanh-> DiaChi = $req->DiaChi;
        $chinhanh->TinhThanh = $req->TinhThanh;
        $chinhanh->QuanHuyen = $req->QuanHuyen;
        $chinhanh->SDT1 = $req->SDT1;
        $chinhanh->SDT2 = $req->SDT2;
        $chinhanh->SDT3 = $req->SDT3;
        $chinhanh->FAX = $req->FAX;
        $chinhanh->SoTaiKhoan = $req->SoTaiKhoan;
        $chinhanh->MoMo = $req->MoMo;
        $chinhanh->NguoiQuanLy = $req->NguoiQuanLy;
        $chinhanh->save();
        session()->flash('message','Cập nhật chi nhánh thành công!');




        return redirect()->route('quanlyCN-view');
    }
    public function xoaChiNhanh($id){
        $chinhanh = ChiNhanh::find($id);
        $chinhanh->delete();
        return redirect()->route('quanlyCN-view');
    }

    public function doiAnhChiNhanh($id, Request $request)
    {

        $chi_nhanh = ChiNhanh::findOrFail($id);

        $matTien = explode('@', $chi_nhanh->email)[0] . '_' . $chi_nhanh->id . '_avatar_' . time() . '.' . $request->file('HinhAnh')->getClientOriginalExtension();

        $request->file('HinhAnh')->storeAs('assets/images/branch', $matTien);

        $chi_nhanh->HinhAnh = $matTien;
        $chi_nhanh->save();

        return back()->with('success', 'Đổi hình chi nhánh thành công.');
    }
}
