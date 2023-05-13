<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\NhapHangMoi;
use Carbon\Carbon;
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
        return view('he-thong.kho-hang.san-pham.ds-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }
    public function themSPhamView(){
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.kho-hang.san-pham.them-sanpham')->with([
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);;
    }
    public function themSPham(Request $req){
        $sanpham = new SanPham();
        // $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->MaSanPham = SanPhamController::taoMaKhoaChinh('SP');
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
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham')->with('SanPham', $sanpham);

    }

    public function capNhatSPhamView($id){
        $sanpham = SanPham::with('loaiSanPham', 'loaiKichCo')->find($id);
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        response()->json($sanpham);
        return view('he-thong.kho-hang.san-pham.capnhat-sanpham')->with([
            'SanPham'=> $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);;
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
    public function xoaCTSPham($id){
        $ctsp = ChiTietSanPham::find($id);
        $ctsp->delete();
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
    public function layDsCTSanPhamAjax($masanpham)
    {
        $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham);
        // /dd(ChiTietSanPham::layChiTiettheoSanPham($masanpham));
        return DataTables::of($ctsp)->make(true);
    }

    // cập nhật chi tiết sản phẩm
    public function capNhatCTSPham(Request $req, $id){
        $ctsp = ChiTietSanPham::findOrFail($id);
        $ctsp->SoSerial = $req->SoSerial;
        $ctsp->KichCo = $req->KichCo;
        $ctsp->GhiChu = $req->GhiChu;
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $ctsp->updated_at = $dt;
        $ctsp->save();
        session()->flash('message','Cập nhật chi tiết sản phẩm thành công!');
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham');
    }

    public static function taoMaKhoaChinh($prefix){
        DB::select('CALL sp_KhoiTaoKyHieu(?, @p_code)', [$prefix]);
        $code = DB::select('SELECT @p_code AS code')[0]->code;
        return $code;
    }

    public function nhapMoiSPham(Request $req){
        // ----- Lưu thông tin nhập mới
            $nhapmoi = new NhapHangMoi();
            $nhapmoi->MaPhieuNhap = SanPhamController::taoMaKhoaChinh('NHM');
            $nhapmoi->MaSanPham = SanPhamController::taoMaKhoaChinh('SP');
            $nhapmoi->TenSanPham = $req->TenSanPham;
            $nhapmoi->ThuongHieu = $req->ThuongHieu;
            $nhapmoi->LoaiNhap = $req->LoaiNhap;
            $nhapmoi->SoLuongNhap = $req->SoLuongNhap;
            $nhapmoi->VAT = $req->VAT;
            $nhapmoi->GiaVAT = $req->GiaVAT;
            $nhapmoi->GiaTien = $req->GiaTien;
            $nhapmoi->GiaTienSauThue = $req->GiaTienSauThue;
            $nhapmoi->TongTien = $req->TongTien;
            $nhapmoi->MoTa = $req->MoTa;
            $nhapmoi->MaChiNhanh = $req->MaChiNhanh;

            // Lưu ảnh sản phẩm
            $HinhAnh = "";
            if ($req->file('HinhAnh')){
                $HinhAnh =  $nhapmoi->MaSanPham . '_nhaphang_' . '.' . $req->file('HinhAnh')->getClientOriginalExtension();
                $req->file('HinhAnh')->storeAs('assets/images/nhap_hang', $HinhAnh);
            }
            $nhapmoi->HinhAnh = $HinhAnh;

            $nhapmoi->LoaiKichCo = $req->LoaiKichCo;
            $nhapmoi->KichCo = $req->KichCo;
            $nhapmoi->SoSerial = $req->SoSerial;
            $nhapmoi->SoLuongSerial = $req->SoLuongSerial;
            $nhapmoi->LoaiSanPham = $req->LoaiSanPham;
            $nhapmoi->GhiChu = $req->GhiChu;
            $nhapmoi->NguoiTao = $req->NguoiTao;

        // ----  Lưu thông tin của sản phẩm nhập mới
            $sp = new SanPham();
            $sp->MaSanPham = $nhapmoi->MaSanPham;
            $sp->TenSanPham = $req->TenSanPham;
            $sp->ThuongHieu = $req->ThuongHieu;
            $sp->VAT = $req->VAT;
            $sp->GiaVAT = $req->GiaVAT;
            $sp->GiaTien = $req->GiaTienSauThue;
            $sp->MoTa = $req->MoTa;

            // Lưu ảnh sản phẩm
            $HinhAnhSP = "";
            if ($req->file('HinhAnh')){
                $HinhAnhSP =  $nhapmoi->MaSanPham . '_sanpham_' . '.' . $req->file('HinhAnh')->getClientOriginalExtension();
                $req->file('HinhAnh')->storeAs('assets/images/san_pham', $HinhAnhSP);
            }
            $sp->HinhAnh = $HinhAnhSP;

            $sp->LoaiKichCo = $req->LoaiKichCo;
            $sp->LoaiSanPham = $req->LoaiSanPham;
            $sp->GhiChu = $req->GhiChu;
            $sp->NguoiTao = $req->NguoiTao;

        // Check nếu nhập số lượng serial khác với số lượng hàng thì báo lỗi
        if(count(explode(",", $req->SoSerial)) < $req->SoLuongNhap)
        {
            session()->flash('message.warning','Số lượng sản phẩm không khớp với số lượng serial!');
            return;
        }
        // Mảng số serial để nhập lô hàng
        $dsSerial = explode(",", $req->SoSerial);

        if($req->input('LoaiNhap') == 'NhapLo'){ // Nếu nhập lô thì chia theo list serial đã cắt chuỗi ở trên

            for ($i=0; $i < $req->SoLuongNhap; $i++) {
                # code...
                $chitietsp = new ChiTietSanPham();
                $chitietsp->MaCTSanPham = SanPhamController::taoMaKhoaChinh('CTSP');
                $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                $chitietsp->MaSanPham = $nhapmoi->MaSanPham;
                $chitietsp->KichCo = $nhapmoi->KichCo;
                $chitietsp->MaChiNhanh = $req->MaChiNhanh;
                $chitietsp->MaPhieuNhap = $nhapmoi->MaPhieuNhap;
                $chitietsp->TinhTrang = 1;
                $chitietsp->GhiChu = $req->GhiChu;
                $chitietsp->NguoiTao = $req->NguoiTao;
                $chitietsp->save();
            }
        }
        else {
            $chitietsp = new ChiTietSanPham();
            $chitietsp->MaCTSanPham = SanPhamController::taoMaKhoaChinh('CTSP');
            $chitietsp->SoSerial = $req->SoSerial;
            $chitietsp->MaSanPham = $nhapmoi->MaSanPham;
            $chitietsp->KichCo = $nhapmoi->KichCo;
            $chitietsp->MaChiNhanh = $req->MaChiNhanh;
            $chitietsp->MaPhieuNhap = $nhapmoi->MaPhieuNhap;
            $chitietsp->TinhTrang = 1;
            $chitietsp->GhiChu = $req->GhiChu;
            $chitietsp->NguoiTao = $req->NguoiTao;
            $chitietsp->save();
        }

        $nhapmoi->save();
        $sp->save();
        return back()->with('message.success','Nhập sản phẩm thành công!');
    }
}
