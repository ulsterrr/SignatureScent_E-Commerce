<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\NhapHangMoi;
use App\Models\TinTuc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SanPhamController extends Controller
{
    //Xử lý hàm sp dành cho admin
    public function loadSPView()
    {
        $sanpham = SanPham::all();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.kho-hang.san-pham.ds-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }

    public function themSPham(Request $req)
    {
        $sanpham = new SanPham();
        // $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->MaSanPham = $this->taoMaKhoaChinh('SP');
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req->MoTa;
        $sanpham->HinhAnh = $req->HinhAnh;
        $sanpham->LoaiKichCo = $req->LoaiKichCo;
        $sanpham->LoaiSanPham = $req->LoaiSanPham;
        $sanpham->GhiChu = $req->GhiChu;
        $sanpham->NguoiTao = $req->NguoiTao;
        session()->flash('message', 'Thêm sản phẩm thành công!');
    }

    public function chiTietSPhamView($id)
    {
        $sanpham = SanPham::with('loaiSanPham', 'loaiKichCo')->where('MaSanPham', $id)->first();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        response()->json($sanpham);
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }

    public function capNhatSPhamView($id)
    {
        $sanpham = SanPham::with('loaiSanPham', 'loaiKichCo')->where('MaSanPham', $id)->first();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        response()->json($sanpham);
        return view('he-thong.kho-hang.san-pham.capnhat-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }
    public function capNhatSPham(Request $req, $id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req->MoTa;
        $sanpham->HinhAnh = $req->HinhAnh;
        $sanpham->LoaiKichCo = $req->LoaiKichCo;
        $sanpham->LoaiSanPham = $req->LoaiSanPham;
        $sanpham->GhiChu = $req->GhiChu;
        $sanpham->NguoiTao = $req->NguoiTao;
        session()->flash('message', 'Cập nhật sản phẩm thành công!');
    }
    public function xoaSPham($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect()->route("quanlySPView");
    }
    public function xoaCTSPham($id)
    {
        $ctsp = ChiTietSanPham::find($id);
        $ctsp->delete();
    }

    //Xử lý hàm sản phẩm cho client
    public function loadSDYeuThich()
    {

    }
    public function loadChiTietSP()
    {

    }
    public function loadSPTheoLoai()
    {

    }

    public function layDsSanPhamAjax()
    {
        $sp = SanPham::getTatCaSanPham();
        return DataTables::of($sp)->make(true);
    }
    public function layDsCTSanPhamAjax($masanpham)
    {
        // $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham);
        if (Auth::user()->LoaiTaiKhoan == 'A') {
            $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham)
                ->get();
            return DataTables::of($ctsp)->make(true);
        }
        $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham)
            ->where('MaChiNhanh', Auth::user()->ChiNhanh)
            ->get();
        return DataTables::of($ctsp)->make(true);
    }

    // cập nhật chi tiết sản phẩm
    public function capNhatCTSPham(Request $req, $id)
    {
        $ctsp = ChiTietSanPham::findOrFail($id);
        $ctsp->SoSerial = $req->SoSerial;
        $ctsp->KichCo = $req->KichCo;
        $ctsp->GhiChu = $req->GhiChu;
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $ctsp->updated_at = $dt;
        $ctsp->save();
        session()->flash('message', 'Cập nhật chi tiết sản phẩm thành công!');
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham');
    }

    public function loadSPClient()
    {
        $sp = SanPham::paginate(8);
        $spnam = SanPham::where('LoaiSanPham','LSP01')->paginate(8);
        $spnu = SanPham::where('LoaiSanPham','LSP02')->paginate(8);
        $spnichnam = SanPham::where('LoaiSanPham','LSP05')->paginate(8);
        $spnichnu = SanPham::where('LoaiSanPham','LSP06')->paginate(8);
        $spgiatot = SanPham::whereBetween('GiaTien', [500000, 2000000])->get();
        $tintuc = TinTuc::all();
        $spbc = SanPham::whereBetween('GiaTien',[100000, 3000000])->get();
        return view('layouts.homepage.home')->with([
            'SPall' => $sp,
            'SPNam' => $spnam,
            'SPNu' => $spnu,
            'SPNNam' => $spnichnam,
            'SPNNu' => $spnichnu,
            'SPbc' => $spbc,
            'SPGiaTot' => $spgiatot,
            'TinTuc' => $tintuc  ]);
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $sanPham = SanPham::where('TenSanPham','LIKE','%' .$data['query']. '%')->get();
            $output = "<ul class='dropdown-menu' style='display:block; position: relative;' > ";
            $html = view('layouts.webpage.tim-kiem-dropdown')->with([
                'sanPham' => $sanPham
            ])->render();
            return response()->json(['html' => $html]);
        }
    }
}
