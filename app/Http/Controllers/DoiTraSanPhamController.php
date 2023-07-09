<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use App\Models\ChiTietDonHang;
use App\Models\DoiTraSanPham;
use App\Models\DonHang;
use App\Models\KhuyenMai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DoiTraSanPhamController extends Controller
{
    public function doiTraView($mdh)
    {
        $DH = DonHang::layDonHangTheoMa($mdh);
        $giamGia = KhuyenMai::where('MaKhuyenMai',$DH->MaKhuyenMai)->first();
        $tienGiam = 0;
        if($giamGia){
            $tienGiam = $giamGia->GiaTri;
        }
        return view('he-thong.ban-hang.don-hang.doitra-donhang')->with(['DonHang' => $DH, 'TienGiam' => $tienGiam]);
    }
    public function dsDonHangDoiTraView()
    {
        return view('he-thong.ban-hang.don-hang.doitra-donhang');
    }

    public function doiTraHang(Request $request) {
        // Lấy thông tin 2 mảng từ request
        $MaDonHang = $request->input('MaDonHang');
        $dataTableDataCTSPB = json_decode($request->input('dataTableDataCTSPB'), true);
        $dataTableDataCTSPD = json_decode($request->input('dataTableDataCTSPD'), true);

        $donHang = DonHang::where('MaDonHang',$MaDonHang)->first();
        $donHang->DoiTra = $request->DoiTra;
        $donHang->LyDoDoiTra = $request->LyDoDoiTra;
        $donHang->NguoiThucHien = auth()->user()->email;
        $donHang->NgayThucHien = Carbon::now();

        for ($i=0; $i < count($dataTableDataCTSPB); $i++) {
            $DoiTraSanPham = new DoiTraSanPham();
            foreach ($dataTableDataCTSPB as $item) {
                $DoiTraSanPham->MaDonHang = $MaDonHang;
                $DoiTraSanPham->ChiTietSPHienTai = $item['MCTSP'];
                $DoiTraSanPham->LoaiDoiTra = 0;
                $DoiTraSanPham->NguoiTao = auth()->user()->email;
                // Lưu lại chi tiết đơn hàng
                if($donHang->DoiTra = 'TRA'){
                    $chiTietDonHang = ChiTietDonHang::where(['MaDonHang' => $MaDonHang, 'MaSanPham' => $item['MSP']])->first();
                    $chiTietDonHang->Soluong -= 1;
                    $chiTietDonHang->TongTien -= $chiTietDonHang->GiaTien;
                    $donHang->TongTien -= $chiTietDonHang->GiaTien;
                    $chiTietDonHang->save();
                }
                $DoiTraSanPham->save();
            }

            if(isset($dataTableDataCTSPD))
            foreach ($dataTableDataCTSPD as $item) {
                $DoiTraSanPham->ChiTietSPDoiMoi = $item['MCTSP'];
                $DoiTraSanPham->LoaiDoiTra = 1;
                $DoiTraSanPham->NguoiTao = auth()->user()->email;
                // Lưu lại chi tiết đơn hàng
                $DoiTraSanPham->save();
            }
        }

        // Tạo chuỗi các Chi tiết sản phẩm để cập nhật mã đơn cho CTSP
        $col_mctsp = array_column($dataTableDataCTSPB, 'MCTSP');
        for ($i = 0; $i < count($col_mctsp); $i++) {
            $mctsp = $col_mctsp[$i];
            DB::table('chi_tiet_san_phams')
                ->where('MaCTSanPham', $mctsp)
                ->update(['MaDonHang' => null, 'TinhTrang' => 1]);
        }
        // Đặt lại mã đơn cho chi tiết đổi
        $col_mctsp = array_column($dataTableDataCTSPD, 'MCTSP');
        for ($i = 0; $i < count($col_mctsp); $i++) {
            $mctsp = $col_mctsp[$i];
            DB::table('chi_tiet_san_phams')
                ->where('MaCTSanPham', $mctsp)
                ->update(['MaDonHang' => $MaDonHang]);
        }

        $donHang->save();
        return redirect()->route('ds-donhang-view')->with('message', 'Thêm mới đơn hàng thành công');
    }

    public function xemDoiTraView($mdh) {
        $DH = DonHang::where('MaDonHang',$mdh)->first();
        $chiTietBan = DoiTraSanPham::doiTraCuaDonHangBan($mdh);
        $chiTietDoi = DoiTraSanPham::doiTraCuaDonHangDoi($mdh);
        $giamGia = KhuyenMai::where('MaKhuyenMai',$DH->MaKhuyenMai)->first();
        $tienGiam = 0;
        if($giamGia){
            $tienGiam = $giamGia->GiaTri;
        }
        return view('he-thong.ban-hang.don-hang.xem-doitra')->with(['DonHang' => $DH, 'ChiTietBan' => $chiTietBan, 'ChiTietDoi' => $chiTietDoi, 'TienGiam' => $tienGiam]);
    }

    public function dsDoiTraAjax() {
        $dsDH = DonHang::whereNotNull('DoiTra')->get();
        return DataTables::of($dsDH)->make(true);
    }

    public function dsDoiTraView() {
        $cn = ChiNhanh::all();
        return view('he-thong.ban-hang.don-hang.ds-doitra')->with(['chiNhanh' => $cn]);
    }

    public function loadDoiTraFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);

        $MaDonHang = $filters['MaDonHang'] ?? null;
        $Email = $filters['Email'] ?? null;
        $HoTen = $filters['HoTen'] ?? null;
        $NguoiThucHien = $filters['NguoiThucHien'] ?? null;
        $DoiTra = $filters['DoiTra'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = DonHang::whereNotNull('DoiTra')->orderBy('MaDonHang','desc');

        if (!empty($HoTen)) {
            $query->where(function ($query) use ($HoTen) {
                $query->where('HoTen', 'LIKE', '%' . $HoTen . '%');
            });
        }
        if (!empty($MaDonHang)) {
            $query->where(function ($query) use ($MaDonHang) {
                $query->where('MaDonHang', 'LIKE', '%' . $MaDonHang . '%');
            });
        }
        if (!empty($Email)) {
            $query->where(function ($query) use ($Email) {
                $query->where('Email', 'LIKE', '%' . $Email . '%');
            });
        }
        if (!empty($NguoiThucHien)) {
            $query->where(function ($query) use ($NguoiThucHien) {
                $query->where('NguoiThucHien', 'LIKE', '%' . $NguoiThucHien . '%');
            });
        }


        if (!empty($DoiTra)) {
            $query->where(function ($query) use ($DoiTra) {
                $query->where('DoiTra', 'LIKE', '%' . $DoiTra . '%' );
            });
        }


        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();

            $query->where('NgayThucHien', '>=', $created_at_from)
                ->where('NgayThucHien', '<=', $created_at_to);

        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $query->where('NgayThucHien', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();
            $query->where('NgayThucHien', '<=', $created_at_to);
        }
        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }
}
