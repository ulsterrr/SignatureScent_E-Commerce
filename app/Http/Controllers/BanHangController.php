<?php

namespace App\Http\Controllers;

use App\Jobs\DonHangJob;
use App\Jobs\DonHangHuyJob;
use App\Jobs\DonHangVCJob;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietSanPham;
use App\Models\DonHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BanHangController extends Controller
{
    public function suaDonHang (Request $request){
        // Lấy thông tin 2 mảng từ request
        $dataTableDataSP = json_decode($request->input('dataTableDataSP'), true);
        $dataTableDataCTSP = json_decode($request->input('dataTableDataCTSP'), true);
        $tongTien = $request->input('TongTien');
        $maDonHang = $request->input('MaDonHang');

        // Tạo đơn hàng
        $donHang = DonHang::where('MaDonHang',$maDonHang)->first();
        $donHang->TongTien = $tongTien;
        $donHang->HoTen = $request->HoTen;
        $donHang->SDT = $request->SDT;
        $donHang->Email = $request->Email;
        $donHang->DiaChi = $request->DiaChi;
        $donHang->QuanHuyen = $request->QuanHuyen;
        $donHang->TinhThanh = $request->TinhThanh;
        $donHang->GhiChu = $request->GhiChu;
        $donHang->VanChuyen = $request->VanChuyen;
        $donHang->MaKhuyenMai = $request->MaKhuyenMai;
        $donHang->LoaiThanhToan = $request->ThanhToan;
        $donHang->NguoiTao = auth()->user()->email;
        $donHang->ChiNhanh = auth()->user()->ChiNhanh;
        $donHang->TrangThai = '0';

        // Tạo các chi tiết đơn hàng
        DB::table('chi_tiet_don_hangs')->where('MaDonHang', '=', $maDonHang)->delete(); // Xoá các chi tiết cũ để insert chi tiết mới
        foreach ($dataTableDataSP as $item) {
            $chiTietDonHang = new ChiTietDonHang();
            $chiTietDonHang->MaCTDonHang = $this->taoMaKhoaChinh('CTDH');
            $chiTietDonHang->MaDonHang = $maDonHang;
            $chiTietDonHang->MaSanPham = $item['MSP'];
            $chiTietDonHang->Soluong = $item['SL'];
            $chiTietDonHang->GiaTien = $item['Gia'];
            $chiTietDonHang->TongTien = $item['TongTien'];
            // Lưu lại chi tiết đơn hàng
            $chiTietDonHang->save();
        }
        // Cập nhật lại các chi tiết sản phẩm cũ thành trống MaDonHang
        DB::table('chi_tiet_san_phams')
            ->where('chi_tiet_san_phams.MaDonHang', '=', $maDonHang)
            ->update(['chi_tiet_san_phams.MaDonHang' => null]);

        // Tạo chuỗi các Chi tiết sản phẩm để cập nhật mã đơn cho CTSP
        $col_mctsp = array_column($dataTableDataCTSP, 'MCTSP');
        for ($i = 0; $i < count($col_mctsp); $i++) {
            $mctsp = $col_mctsp[$i];
            DB::table('chi_tiet_san_phams')
                ->where('MaCTSanPham', $mctsp)
                ->update(['MaDonHang' => $maDonHang]);
        }

        // Lưu đơn hàng
        $donHang->save();
        // Gửi mail cho admin và email người mua


        $DH = DonHang::layDonHangTheoMa($maDonHang);
        $allsp = ChiTietSanPham::donHang($maDonHang);
        return back()->with(['message' => 'Cập nhật đơn hàng thành công','DonHang' => $DH, 'ChiTietSanPhamDH' => $allsp]);
    }
    public function xoaDonHang(){

    }
    public function dSDonHangView(){
        return view('he-thong.ban-hang.don-hang.ds-donhang');
    }
    public function loadDSDonHang(){

    }
    public function taoDonHangView(){
        return view('he-thong.ban-hang.don-hang.don-hang');
    }

    public function taoDonHang(Request $request) {
        // Lấy thông tin 2 mảng từ request
        $dataTableDataSP = json_decode($request->input('dataTableDataSP'), true);
        $dataTableDataCTSP = json_decode($request->input('dataTableDataCTSP'), true);

        // Tạo đơn hàng
        $donHang = new DonHang();
        $donHang->MaDonHang = $this->taoMaKhoaChinh('MDH');
        $donHang->TongTien = $request->TongTien;
        $donHang->HoTen = $request->HoTen;
        $donHang->SDT = $request->SDT;
        $donHang->Email = $request->Email;
        $donHang->DiaChi = $request->DiaChi;
        $donHang->QuanHuyen = $request->QuanHuyen;
        $donHang->TinhThanh = $request->TinhThanh;
        $donHang->GhiChu = $request->GhiChu;
        $donHang->VanChuyen = $request->VanChuyen;
        $donHang->MaKhuyenMai = $request->MaKhuyenMai;
        $donHang->LoaiThanhToan = $request->ThanhToan;
        $donHang->NguoiTao = auth()->user()->email;
        $donHang->ChiNhanh = auth()->user()->ChiNhanh;
        $donHang->TrangThai = '0';

        $tongTien = 0;
        // Tạo các chi tiết đơn hàng
        foreach ($dataTableDataSP as $item) {
            $chiTietDonHang = new ChiTietDonHang();
            $chiTietDonHang->MaCTDonHang = $this->taoMaKhoaChinh('CTDH');
            $chiTietDonHang->MaDonHang = $donHang->MaDonHang;
            $chiTietDonHang->MaSanPham = $item['MSP'];
            $chiTietDonHang->Soluong = $item['SL'];
            $chiTietDonHang->GiaTien = $item['Gia'];
            $chiTietDonHang->TongTien = $item['TongTien'];
            $tongTien += $item['TongTien'];
            // Lưu lại chi tiết đơn hàng
            $chiTietDonHang->save();
        }

        // Tạo chuỗi các Chi tiết sản phẩm để cập nhật mã đơn cho CTSP
        $col_mctsp = array_column($dataTableDataCTSP, 'MCTSP');
        $maDonHang = $donHang->MaDonHang;
        for ($i = 0; $i < count($col_mctsp); $i++) {
            $mctsp = $col_mctsp[$i];
            DB::table('chi_tiet_san_phams')
                ->where('MaCTSanPham', $mctsp)
                ->update(['MaDonHang' => $maDonHang]);
        }

        // Lưu đơn hàng
        $donHang->save();
        // Gửi mail cho admin và email người mua
        $sendMail = (new DonHangJob($donHang, $dataTableDataSP, '', 'Đơn hàng', $tongTien));
        $this->dispatch($sendMail);
        return redirect()->route('ds-donhang-view')->with('message', 'Thêm mới đơn hàng thành công');
    }

    public function layChiTietTheoSanPhamDH($listmsp) {
        $allsp = ChiTietSanPham::layChiTietTheoSanPhamDH($listmsp);
        return DataTables::of($allsp)->make(true);
    }

    public function layDsDonHangAjax() {
        return DataTables::of(DonHang::with('getUserTao', 'getChiNhanh')->get())->make(true);
    }

    public function layChiTietDonHangAjax($mdh) {
        return DataTables::of(ChiTietDonHang::with('getUserTao', 'getChiNhanh')->where('MaDonHang',$mdh)->first())->make(true);
    }

    public function loadChiTietDonHang($mdh){
        $DH = DonHang::layDonHangTheoMa($mdh);
        $allsp = ChiTietSanPham::donHang($mdh);
        return view('he-thong.ban-hang.don-hang.capnhat-donhang')->with(['DonHang' => $DH, 'ChiTietSanPhamDH' => $allsp]);
    }

    public function xemChiTietDonHang($mdh){
        $DH = DonHang::layDonHangTheoMa($mdh);
        $allsp = ChiTietSanPham::donHang($mdh);
        return view('he-thong.ban-hang.don-hang.xem-donhang')->with(['DonHang' => $DH, 'ChiTietSanPhamDH' => $allsp]);
    }

    public function xacNhanDonHang($mdh){
        $dh = DonHang::where('MaDonHang', $mdh)->firstOrFail();
        $dh->TrangThai = 3;
        $dh->updated_at = Carbon::now();

        // Cập nhật lại tình trạng cho chi tiết sản phẩm
        DB::table('chi_tiet_san_phams')
            ->where('chi_tiet_san_phams.MaDonHang', '=', $mdh)
            ->update(['chi_tiet_san_phams.TinhTrang' => 4]);

        $dh->save();

        // Gửi mail cho admin và email người mua
        $donHang = DonHang::layDonHangTheoMa($mdh);
        $tongTien = $donHang->chiTietDonHang->sum('TongTien');
        $sendMail = (new DonHangVCJob($donHang, $donHang->chiTietDonHang, '', 'Đơn hàng', $tongTien));
        $this->dispatch($sendMail);
    }
    public function huyDonHang($mdh){
        $dh = DonHang::where('MaDonHang', $mdh)->firstOrFail();
        $dh->TrangThai = 4;
        $dh->updated_at = Carbon::now();

        // Cập nhật lại trống MaDonHang cho chi tiết sản phẩm
        DB::table('chi_tiet_san_phams')
            ->where('chi_tiet_san_phams.MaDonHang', '=', $mdh)
            ->update(['chi_tiet_san_phams.MaDonHang' => null]);

        $dh->save();

        // Gửi mail cho admin và email người mua
        $donHang = DonHang::layDonHangTheoMa($mdh);
        $tongTien = $donHang->chiTietDonHang->sum('TongTien');
        $sendMail = (new DonHangHuyJob($donHang, $donHang->chiTietDonHang, '', 'Đơn hàng', $tongTien));
        $this->dispatch($sendMail);
    }
    public function vanChuyenDonHang($mdh){
        $dh = DonHang::where('MaDonHang', $mdh)->firstOrFail();
        $dh->TrangThai = 1;
        $dh->updated_at = Carbon::now();

        // Cập nhật lại trống MaDonHang cho chi tiết sản phẩm
        DB::table('chi_tiet_san_phams')
            ->where('chi_tiet_san_phams.MaDonHang', '=', $mdh)
            ->update(['chi_tiet_san_phams.TinhTrang' => '2']);

        $dh->save();

        // Gửi mail cho admin và email người mua
        $donHang = DonHang::layDonHangTheoMa($mdh);
        $tongTien = $donHang->chiTietDonHang->sum('TongTien');
        $sendMail = (new DonHangVCJob($donHang, $donHang->chiTietDonHang, '', 'Đơn hàng đang được vận chuyển', $tongTien));
        $this->dispatch($sendMail);
    }
}
