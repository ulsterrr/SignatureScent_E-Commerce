<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\KhuyenMai;
use Yajra\DataTables\DataTables;

class MaKhuyenMaiController extends Controller
{
    public function loadMKMView(){
        $khuyenmai = KhuyenMai::all();
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai')->with('khuyenmai',$khuyenmai);
    }
    public function themMKMView(){
        return view('');
    }
    public function themMKM(Request $req){
        $khuyenmai = new KhuyenMai();
        $khuyenmai->MaKhuyenMai = $req->MaKhuyenMai;
        $khuyenmai->NoiDung = $req->NoiDung;
        $khuyenmai->SoLuong = $req->SoLuong;
        $khuyenmai->GiaTri = $req->GiaTri;
        $khuyenmai->NguoiTao = auth()->user()->email;
        $khuyenmai->save();
        session()->flash('message','Thêm loại sản phẩm thành công!');
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai');

    }

    public function chiTietMKMView($id){
        $khuyenmai = KhuyenMai::find($id);
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai',compact('khuyenmai'));

    }

    public function capNhatMKMView($id){
        $khuyenmai = KhuyenMai::find($id);
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai',compact('khuyenmai'));
    }
    public function capNhatMKM(Request $req, $id){
        $khuyenmai = KhuyenMai::findOrFail($id);
        $khuyenmai->MaKhuyenMai = $req->MaKhuyenMai;
        $khuyenmai->NoiDung = $req->NoiDung;
        $khuyenmai->SoLuong = $req->SoLuong;
        $khuyenmai->GiaTri = $req->GiaTri;
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $khuyenmai->updated_at = $dt;
        $khuyenmai->save();
        session()->flash('message','Cập nhật loại sản phẩm thành công!');
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai');
    }
    public function xoaMKM($id){
        $khuyenmai = KhuyenMai::find($id);
        $khuyenmai->delete();
        return view('he-thong.ban-hang.khuyen-mai.ds-ma-khuyenmai');
    }

    public function layDsMKMAjax()
    {
        $km = KhuyenMai::all();
        return DataTables::of($km)->make(true);
    }
    public function kiemTraTrungMKM(Request $request)
    {
        $dup = KhuyenMai::where('MaKhuyenMai', $request->MaKhuyenMai)->first();
        if(!$dup) return response()->json(['valid' => false]);
        else return response()->json(['valid' => true]);
    }

}
