<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function loadThongTinClient($id){
        $user = User::find($id);
        return view('layouts.tai-khoan.thong-tin-tai-khoan',compact('user'));
    }

    public function thongTinClient(Request $req,$id)
    {
        $user = User::find($id);
        $user->HoTen = $req->HoTen;
        $user->SDT = $req->SDT;
        $user->email = $req->email;
        $user->DiaChi = $req->DiaChi;
        $user->TinhThanh = $req->TinhThanh;
        $user->QuanHuyen = $req->QuanHuyen;
        $user->NgaySinh = $req->NgaySinh;
        $user->GioiTinh = $req->GioiTinh;
        session()->flash('message','cập nhật thành công!');
        $user->save();
        return redirect()->route('thongtin-client-view',['id'=>$user->id]);
    }

    public function loadMKClient($id){
        $user = User::find($id);
        return view('layouts.tai-khoan.doi-matkhau-client',compact('user'));
    }
    public function doiMKCLient(Request $req,$id){

            $user = User::find($id);
            $user->password = Hash::make($req->MatKhauMoi);
            session()->flash('message','cập nhật thành công!');
            $user->save();
            return redirect()->route('doimk-client-view',['id'=>$user->id]);
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
