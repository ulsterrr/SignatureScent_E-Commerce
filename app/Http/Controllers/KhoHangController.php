<?php

namespace App\Http\Controllers;

use App\Imports\SanPhamImport;
use App\Jobs\DieuChuyen as JobsDieuChuyen;
use App\Jobs\DieuChuyenDone;
use App\Jobs\DieuChuyenJob;
use App\Jobs\NhapKhoJob;
use App\Models\ChiNhanh;
use App\Models\ChiTietDieuChuyen;
use App\Models\ChiTietSanPham;
use App\Models\ChiTietXuatKho;
use App\Models\DieuChuyen;
use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\NhapHangMoi;
use App\Models\NhapKho;
use App\Models\SanPham;
use App\Models\XuatKho;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\DataTables;

class KhoHangController extends Controller
{
    public function nhapKhoHangView(){
        return view('he-thong.kho-hang.nhap-ton-kho.nhap-ton-kho');
    }
    public function dsNhapKhoHangView(){
        return view('he-thong.kho-hang.nhap-ton-kho.ds-nhapkho');
    }
    public function nhapHangView(){
        return view('he-thong.kho-hang.nhap-hang.ds-nhaphang');
    }
    public function xuatKhoView(){
        return view('he-thong.kho-hang.xuat-kho.xuat-kho');
    }
    public function dsXuatKhoView(){
        return view('he-thong.kho-hang.xuat-kho.ds-xuatkho');
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

        // Gửi mail
        $dc = DieuChuyen::layThongTinDieuChuyen($dieuChuyen->MaPhieuDieuChuyen)->first();
        $chi_nhanhA = ChiNhanh::with('nguoiQuanLy')->where('MaChiNhanh',$dieuChuyen->ChiNhanhHienTai)->first();
        $chi_nhanhB = ChiNhanh::with('nguoiQuanLy')->where('MaChiNhanh',$dieuChuyen->ChiNhanhDieuChuyen)->first();
        $sendMail = (new DieuChuyenJob($request->EmailA, $request->EmailB, $chi_nhanhA, $chi_nhanhB, '','Điều chuyển sản phẩm',$dc));
        $this->dispatch($sendMail);

        return redirect()->route('ds-dieuchuyen-view')->with('message', 'Thêm mới phiếu điều chuyển thành công!');
    }

    public function xuatKho(Request $request){
        // Lấy dữ liệu DataTable từ request
        $dataTableData = json_decode($request->input('dataTableData'));

        // Lưu thông tin vào bảng chính
        $xuatKho = new XuatKho();
        $xuatKho->MaXuatKho = $this->taoMaKhoaChinh('PXK');
        $xuatKho->LyDoXuat = $request->LyDoXuat;
        $xuatKho->ChiNhanhNhan = $request->MaChiNhanhNhan;
        $xuatKho->NgayXuat = Carbon::now();
        $xuatKho->NguoiXuatKho = Auth::user()->email;
        $xuatKho->TrangThai = 1;

        // Lưu thông tin vào bảng chi tiết
        foreach ($dataTableData as $chitiet) {
            $chiTietXuatKho = new ChiTietXuatKho();
            $chiTietXuatKho->MaXuatKho = $xuatKho->MaXuatKho;
            $chiTietXuatKho->MaCTXuatKho = $this->taoMaKhoaChinh('CTXK');
            $chiTietXuatKho->MaSanPham = $chitiet->MSP;
            $chiTietXuatKho->MaCTSanPham = $chitiet->CTSP;

            // Cập nhật chi nhánh mới cho sản phẩm kho
            $updateCTSP = ChiTietSanPham::where('MaCTSanPham', $chitiet->CTSP)->firstOrFail();
            $updateCTSP->MaChiNhanh = $request->MaChiNhanhNhan;
            $updateCTSP->updated_at = Carbon::now();
            $updateCTSP->TinhTrang = 1;

            $chiTietXuatKho->TrangThaiHienTai = $chitiet->TT;
            $chiTietXuatKho->GhiChu = $chitiet->GC;
            $chiTietXuatKho->save();
            $updateCTSP->save();
        }

        $xuatKho->save();
        return redirect()->route('ds-xuatkho-view')->with('message', 'Thêm thành công xuất kho sản phẩm');
    }
    public function layDsXuatKhoAjax()
    {
        return DataTables::of(XuatKho::all())->make(true);
    }
    public function chiTietXuatKhoView($mpx){
        $xk = XuatKho::layThongTinXuatKho($mpx);
        return view('he-thong.kho-hang.xuat-kho.xem-xuatkho')->with('XuatKho', $xk);
    }

    public function huyDieuChuyen($mdc){
        $pdc = DieuChuyen::where('MaPhieuDieuChuyen', $mdc)->firstOrFail();
        $pdc->TrangThai = 3;
        $pdc->updated_at = Carbon::now();
        $pdc->save();
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

        // Gửi mail
        $sendMail = (new DieuChuyenDone($pdc->getChiNhanhA, $pdc->getChiNhanhB, '', 'Điều chuyển sản phẩm', $pdc));
        $this->dispatch($sendMail);
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

    public function nhapKhoSanPham(Request $req){
        // ----- Lưu thông tin nhập mới
            $nhapkho = new NhapKho();
            $nhapkho->MaNhapKho = $this->taoMaKhoaChinh('PNK');
            $nhapkho->SoLuongNhap = $req->SoLuongNhap;
            $nhapkho->MaSanPham = $req->MaSanPham;
            $nhapkho->MaChiNhanh = $req->MaChiNhanh;
            $nhapkho->TongTien = $req->TongTien;
            $nhapkho->KichCo = $req->KichCo;
            $nhapkho->SoSerial = $req->SoSerial;
            $nhapkho->GhiChu = $req->GhiChu;
            $nhapkho->NguoiTao = $req->NguoiTao;

        // Mảng số serial để nhập lô hàng
        $dsSerial = explode(",", $req->SoSerial);

        if($req->SoLuongNhap > 1){ // Nếu nhập lô thì chia theo list serial đã cắt chuỗi ở trên

            for ($i=0; $i < $req->SoLuongNhap; $i++) {
                $chitietsp = new ChiTietSanPham();
                $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
                $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                $chitietsp->MaSanPham = $nhapkho->MaSanPham;
                $chitietsp->KichCo = $nhapkho->KichCo;
                $chitietsp->MaChiNhanh = $req->MaChiNhanh;
                $chitietsp->MaPhieuNhap = $nhapkho->MaNhapKho;
                $req->MaChiNhanh? $chitietsp->TinhTrang = 1 : $chitietsp->TinhTrang = 0;
                $chitietsp->GhiChu = $req->GhiChu;
                $chitietsp->NguoiTao = $req->NguoiTao;
                $chitietsp->save();
            }
        }
        else {
            $chitietsp = new ChiTietSanPham();
            $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
            $chitietsp->SoSerial = $req->SoSerial;
            $chitietsp->MaSanPham = $nhapkho->MaSanPham;
            $chitietsp->KichCo = $nhapkho->KichCo;
            $chitietsp->MaChiNhanh = $req->MaChiNhanh;
            $chitietsp->MaPhieuNhap = $nhapkho->MaNhapKho;
            $req->MaChiNhanh? $chitietsp->TinhTrang = 1 : $chitietsp->TinhTrang = 0;
            $chitietsp->GhiChu = $req->GhiChu;
            $chitietsp->NguoiTao = $req->NguoiTao;
            $chitietsp->save();
        }

        $nhapkho->save();
        if(auth()->user()->LoaiTaiKhoan == 'A') {
            // Gửi email cho chi nhánh nếu người nhập là Admin
            $list_ctsp = ChiTietSanPham::nhapHang($nhapkho->MaNhapKho);
            $chi_nhanh = ChiNhanh::with('nguoiQuanLy')->where('MaChiNhanh', $nhapkho->MaChiNhanh)->first();
            $sendMail = (new NhapKhoJob($req->MaSanPham, $chi_nhanh, '', 'Nhập kho sản phẩm', $list_ctsp));
            $this->dispatch($sendMail);

        }
        return back()->with('message.success','Nhập sản phẩm thành công!');
    }

    public function layDsNhapKhoAjax()
    {
        return DataTables::of(NhapKho::with('sanPhamNhap', 'getChiNhanh')->get())->make(true);
    }
    public function chiTietNhapKhoView($id){

        return view('he-thong.kho-hang.nhap-ton-kho.xem-nhapkho')->with('NhapKho', NhapKho::layThongTinNhapKho($id));
    }

    public function dsSanPhamModal($mcn) {
        $allsp = ChiTietSanPham::layChiTietVaSanPhamTheoCN($mcn);
        return DataTables::of($allsp)->make(true);
    }

    public function downloadTemplateSanPhamMoi()
    {
        $filePath = storage_path('app\TemplateImport\NhapMoiSanPham.xlsx');

        return response()->download($filePath, 'NhapMoiSanPham.xlsx');
    }

    public function importNhapMoi(Request $request)
    {
        $file = $request->file('file');
        // Excel::import(new SanPhamImport, $file);
        $data = Excel::toArray(new SanPhamImport, $file);
        $data = array_slice($data[0], 11); // Bỏ qua 14 dòng đầu tiên
        return response()->json($data);

    }

    public function saveImportNhapMoi(Request $request)
    {
        $data = $request->input('data');
        foreach ($data as $req) {
            $sp = new SanPham();
            $sp->MaSanPham = $this->taoMaKhoaChinh('SP');
            $sp->TenSanPham = $req[1];
            $sp->ThuongHieu = $req[2];
            $sp->VAT = $req[3];
            $sp->GiaVAT = $req[4];
            $sp->GiaTien = $req[5] + $req[4];
            $sp->MoTa = $req[7];
            $sp->LoaiKichCo = $req[8];
            $sp->LoaiSanPham = $req[10];
            $sp->GhiChu = $req[11];
            $sp->TrangThai = 1;
            $sp->NguoiTao = auth()->user()->email;

            // Mảng số serial để nhập lô hàng
            $dsSerial = explode(",", $req[12]);

                for ($i = 0; $i < $req[6]; $i++) {
                    $chitietsp = new ChiTietSanPham();
                    $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
                    $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                    $chitietsp->MaSanPham = $sp->MaSanPham;
                    $chitietsp->KichCo = $req[9];
                    $chitietsp->MaChiNhanh = $req[13];
                    $chitietsp->MaPhieuNhap = "ImportExcel";
                    $chitietsp->TinhTrang = 1;
                    $chitietsp->GhiChu = $req[11];
                    $chitietsp->NguoiTao = auth()->user()->email;
                    $chitietsp->save();
                }

            $sp->save();
        }

        // Gửi mail thông tin nhập file excel


        return response(true);
    }


    public function importNhapMoiView()
    {
        return view('he-thong.kho-hang.nhap-hang.import-nhapmoi');

    }

    public function importNhapKhoView()
    {
        return view('he-thong.kho-hang.nhap-ton-kho.import-nhapkho');

    }

    public function downloadTemplateSanPhamKho()
    {
        $filePath = storage_path('app\TemplateImport\NhapKhoSanPham.xlsx');

        return response()->download($filePath, 'NhapKhoSanPham.xlsx');
    }

    public function importNhapKho(Request $request)
    {
        $file = $request->file('file');
        // Excel::import(new SanPhamImport, $file);
        $data = Excel::toArray(new SanPhamImport, $file);
        $data = array_slice($data[0], 10); // Bỏ qua 11 dòng đầu tiên
        return response()->json($data);

    }

    public function saveImportNhapKho(Request $request)
    {
        $data = $request->input('data');
        foreach ($data as $req) {
            $sp = SanPham::where('MaSanPham', $req[1])->first();
            // Mảng số serial để nhập lô hàng
            $dsSerial = explode(",", $req[6]);

                for ($i = 0; $i < $req[3]; $i++) {
                    $chitietsp = new ChiTietSanPham();
                    $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
                    $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                    $chitietsp->MaSanPham = $sp->MaSanPham;
                    $chitietsp->KichCo = $req[4];
                    $chitietsp->MaChiNhanh = $req[7];
                    $chitietsp->MaPhieuNhap = "ImportExcel";
                    $chitietsp->TinhTrang = 1;
                    $chitietsp->GhiChu = $req[4];
                    $chitietsp->NguoiTao = auth()->user()->email;
                    $chitietsp->save();
                }

            $sp->save();
        }

        // Gửi mail thông tin nhập file excel


        return response(true);
    }
}
