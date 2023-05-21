<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDieuChuyen;
use App\Models\ChiTietSanPham;
use App\Models\DieuChuyen;
use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\NhapHangMoi;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KhoHangController extends Controller
{
    public function nhapHang(){

    }
    public function nhapHangView(){
        return view('he-thong.kho-hang.nhap-hang.ds-nhaphang');
    }
    public function xuatHang(){

    }
    public function dsDieuChuyenHangView(){
        return view('he-thong.kho-hang.dieu-chuyen.ds-dieuchuyen');
    }
    public function dieuChuyenHangView(){
        return view('he-thong.kho-hang.dieu-chuyen.dieu-chuyen');
    }
    public function dieuChuyenHang(Request $request){
        // Lấy dữ liệu DataTable từ request
        $dataTableData = json_decode($request->input('dataTableData'));

        // Lưu thông tin vào bảng chính
        $dieuChuyen = new DieuChuyen();
        $dieuChuyen->MaPhieuDieuChuyen = $this->taoMaKhoaChinh('PDC');
        $dieuChuyen->LyDoDieuChuyen = $request->LyDoDieuChuyen;
        $dieuChuyen->ChiNhanhHienTai = $request->MaChiNhanhA;
        $dieuChuyen->ChiNhanhDieuChuyen = $request->MaChiNhanhB;
        $dieuChuyen->NgayDieuChuyen = Carbon::now();
        $dieuChuyen->NguoiDieuChuyen = Auth::user()->email;
        $dieuChuyen->TrangThai = 0;

        // Lưu thông tin vào bảng chi tiết
        foreach ($dataTableData as $chitiet) {
            $chiTietDieuChuyen = new ChiTietDieuChuyen();
            $chiTietDieuChuyen->MaPhieuDieuChuyen = $dieuChuyen->MaPhieuDieuChuyen;
            $chiTietDieuChuyen->MaCTDieuChuyen = $this->taoMaKhoaChinh('CTDC');
            $chiTietDieuChuyen->MaSanPham = $chitiet->MSP;
            $chiTietDieuChuyen->MaCTSanPham = $chitiet->CTSP;
            $chiTietDieuChuyen->TrangThaiHienTai = $chitiet->TT;
            $chiTietDieuChuyen->GhiChu = $chitiet->GC;
            $chiTietDieuChuyen->save();
        }

        $dieuChuyen->save();
        return view('he-thong.kho-hang.dieu-chuyen.ds-dieuchuyen');
    }
    public function layDsDieuChuyenAjax()
    {
        $dc = DieuChuyen::all();
        return DataTables::of($dc)->make(true);
    }
    public function chiTietDieuChuyenView($mdc){
        $dc = DieuChuyen::layThongTinDieuChuyen($mdc);
        return view('he-thong.kho-hang.dieu-chuyen.xem-dieuchuyen')->with('DieuChuyen', $dc);
    }
    public function xacNhanDieuChuyen($mdc){
        $pdc = DieuChuyen::where('MaPhieuDieuChuyen', $mdc)->firstOrFail();
        $pdc->TrangThai = 1;
        $pdc->updated_at = Carbon::now();

        // Cập nhật lại chi nhánh mới cho chi tiết sản phẩm
        DB::table('chi_tiet_san_phams')
            ->join('chi_tiet_dieu_chuyens', 'chi_tiet_san_phams.MaCTSanPham', '=', 'chi_tiet_dieu_chuyens.MaCTSanPham')
            ->join('dieu_chuyens', 'chi_tiet_dieu_chuyens.MaPhieuDieuChuyen', '=', 'dieu_chuyens.MaPhieuDieuChuyen')
            ->where('dieu_chuyens.MaPhieuDieuChuyen', '=', $mdc)
            ->update(['chi_tiet_san_phams.MaChiNhanh' => DB::raw('dieu_chuyens.ChiNhanhDieuChuyen')]);

        $pdc->save();
    }
    public function loadDSHangHoa(){

    }
    public function themSPhamView(){
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.kho-hang.nhap-hang.nhap-hang')->with([
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);;
    }

    public function layDsNhapHangAjax()
    {
        $sp = NhapHangMoi::all();
        return DataTables::of($sp)->make(true);
    }
    public function chiTietNhapHangView($id){
        $nh = NhapHangMoi::layThongTinNhapMoi($id);
        return view('he-thong.kho-hang.nhap-hang.xem-nhaphang')->with('NhapHang', $nh);
    }

    public function nhapMoiSPham(Request $req){
        // ----- Lưu thông tin nhập mới
            $nhapmoi = new NhapHangMoi();
            $nhapmoi->MaPhieuNhap = $this->taoMaKhoaChinh('NHM');
            $nhapmoi->MaSanPham = $this->taoMaKhoaChinh('SP');
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
                $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
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
            $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
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

    public function dsSanPhamModal($mcn) {
        $allsp = ChiTietSanPham::layChiTietVaSanPhamTheoCN($mcn);
        return DataTables::of($allsp)->make(true);
    }
}
