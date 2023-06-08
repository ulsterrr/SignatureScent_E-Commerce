<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BanHangController extends Controller
{
    public function suaDonHang (){

    }
    public function xoaDonHang(){

    }
    public function xuLyDon(){

    }
    public function loadDSDonHang(){

    }
    public function loadChiTietDonHang(){
        return view('he-thong.ban-hang.don-hang.don-hang');
    }

    public function taoDonHang(Request $request) {
        // Lấy thông tin 2 mảng từ request
        $dataTableDataSP = json_decode($request->input('dataTableDataSP'), true);
        $dataTableDataCTSP = json_decode($request->input('dataTableDataCTSP'), true);

        // Tạo đơn hàng
        $donHang = new DonHang();
        $donHang->MaDonHang = $this->taoMaKhoaChinh('MDH');
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

        // Tạo các chi tiết đơn hàng
        foreach ($dataTableDataSP as $item) {
            $chiTietDonHang = new ChiTietDonHang();
            $chiTietDonHang->MaCTDonHang = $this->taoMaKhoaChinh('CTDH');
            $chiTietDonHang->MaDonHang = $donHang->MaDonHang;
            $chiTietDonHang->MaSanPham = $item['MSP'];
            $chiTietDonHang->Soluong = $item['SL'];
            $chiTietDonHang->GiaTien = $item['Gia'];
            $chiTietDonHang->TongTien = $item['TongTien'];
            // Lưu lại chi tiết đơn hàng
            $chiTietDonHang->save();
        }

        // Tạo chuỗi các Chi tiết sản phẩm để cập nhật mã đơn cho CTSP
        $col_mctsp = array_column($dataTableDataCTSP, 'MCTSP');
        $list_mctsp = implode(', ', $col_mctsp);

        // Cập nhật MaDonHang cho các ChiTietSanPham
        DB::table('ChiTietSanPham')
                ->whereIn('MCTSP', $list_mctsp)
                ->update(['MaDonHang' => $donHang->MaDonHang]);
        // Lưu đơn hàng
        $donHang->save();
        // Gửi mail cho admin và email người mua

        return view('he-thong.ban-hang.don-hang.don-hang');
    }
}
