<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ThongKeController extends Controller
{
    public function loadDSTonKho(){

    }
    public function loadDoanhThu(){

    }
    public function loadSPBanChay(){

    }
    public function sanPhamThangView(){
        $cn = ChiNhanh::all();
        return view('thong-ke.thongke-sanpham')->with('chiNhanh', $cn);
    }
    public function thongKeDonHangView(){
        $cn = ChiNhanh::all();
        return view('thong-ke.thongke-donhang')->with('chiNhanh', $cn);
    }
    public function thongKeDoanhThuView(){
        $cn = ChiNhanh::all();
        return view('thong-ke.thongke-doanhthu')->with('chiNhanh', $cn);
    }

    public function thongKeSanPhamAjax(){
        $sp = SanPham::select('san_phams.*', DB::raw('(SELECT COUNT(*) FROM chi_tiet_san_phams WHERE chi_tiet_san_phams.MaSanPham = san_phams.MaSanPham) as SoLuong'))
            ->get();
        return DataTables::of($sp)->make(true);
    }
    public function thongKeDonHangAjax(){
        $sp = DonHang::select('don_hangs.*', DB::raw('(SELECT TenChiNhanh FROM chi_nhanhs WHERE chi_nhanhs.MaChiNhanh = don_hangs.ChiNhanh) as TenChiNhanh'))->where('TrangThai','=','DONE')
            ->get();
        return DataTables::of($sp)->make(true);
    }

    public function thongKeDoanhThuAjax(){
        $sp = DB::table('chi_nhanhs AS cn')
        ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
        ->leftJoin('chi_tiet_san_phams AS ctsp', 'dh.MaDonHang', '=', 'ctsp.MaDonHang')
        ->select('cn.TenChiNhanh',
                DB::raw('SUM(dh.TongTien) AS TongTien'),
                DB::raw('SUM(dh.TongTien) - IFNULL(SUM(ctsp.GiaTien), 0) AS LoiNhuan'),
                DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
        ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.TrangThai','=','DONE')
        ->groupBy('ThoiGian', 'cn.TenChiNhanh')->get();

        return DataTables::of($sp)->make(true);
    }
    public function loadDoiTraFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);
        $ChiNhanh = $filters['ChiNhanh'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = SanPham::whereNotNull('DoiTra')->orderBy('MaDonHang','desc');

        // if (!empty($ChiNhanh)) {
        //     $query->where(function ($query) use ($ChiNhanh) {
        //         $query->where('HoTen', 'LIKE', '%' . $ChiNhanh . '%');
        //     });
        // }


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

    public function loadSanPhamFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = SanPham::select('san_phams.*', DB::raw('(SELECT COUNT(*) FROM chi_tiet_san_phams WHERE chi_tiet_san_phams.MaSanPham = san_phams.MaSanPham) as SoLuong'));

        // if (!empty($ChiNhanh)) {
        //     $query->where(function ($query) use ($ChiNhanh) {
        //         $query->where('ChiNhanh', 'LIKE', '%' . $ChiNhanh . '%');
        //     });
        // }

        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();

            $query->where('created_at', '>=', $created_at_from)
                ->where('created_at', '<=', $created_at_to);

        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $query->where('created_at', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();
            $query->where('created_at', '<=', $created_at_to);
        }
        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }

    public function loadDonHangFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);
        $ChiNhanh = $filters['ChiNhanh'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = DonHang::select('don_hangs.*', DB::raw('(SELECT TenChiNhanh FROM chi_nhanhs WHERE chi_nhanhs.MaChiNhanh = don_hangs.ChiNhanh) as TenChiNhanh'))->where('dh.TrangThai','=','DONE');

        if (!empty($ChiNhanh)) {
            $query->where(function ($query) use ($ChiNhanh) {
                $query->where('ChiNhanh', 'LIKE', '%' . $ChiNhanh . '%');
            });
        }

        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();

            $query->where('created_at', '>=', $created_at_from)
                ->where('created_at', '<=', $created_at_to);

        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $query->where('created_at', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();
            $query->where('created_at', '<=', $created_at_to);
        }
        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }
    public function loadDoanhThuFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);
        $ChiNhanh = $filters['ChiNhanh'] ?? null;
        $created_at_from = $filters['created_at_from_submit'] ?? null;
        $created_at_to = $filters['created_at_to_submit'] ?? null;
        // $query = DB::table('chi_nhanhs AS cn')
        // ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
        // ->select('cn.TenChiNhanh', DB::raw('SUM(dh.TongTien) AS TongTien'), DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
        // ->whereNotNull('dh.MaDonHang')
        // ->groupBy('ThoiGian', 'cn.TenChiNhanh');

        $query = DB::table('chi_nhanhs AS cn')
            ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
            ->leftJoin('chi_tiet_san_phams AS ctsp', 'dh.MaDonHang', '=', 'ctsp.MaDonHang')
            ->select('cn.TenChiNhanh',
                    DB::raw('SUM(dh.TongTien) AS TongTien'),
                    DB::raw('SUM(dh.TongTien) - IFNULL(SUM(ctsp.GiaTien), 0) AS LoiNhuan'),
                    DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
            ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.TrangThai','=','DONE')
            ->groupBy('ThoiGian', 'cn.TenChiNhanh');

        if (!empty($ChiNhanh)) {
            $query->where(function ($query) use ($ChiNhanh) {
                $query->where('cn.MaChiNhanh', 'LIKE', '%' . $ChiNhanh . '%');
            });
        //     $query = DB::table('chi_nhanhs AS cn')
        //         ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
        //         ->select('cn.TenChiNhanh', DB::raw('SUM(dh.TongTien) AS TongTien'), DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
        //         ->whereNotNull('dh.MaDonHang')
        //         ->where('cn.MaChiNhanh', 'LIKE', '%' . $ChiNhanh . '%')
        //         ->groupBy('ThoiGian', 'cn.TenChiNhanh');
        }

        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfMonth()->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfMonth()->endOfDay();
            $query = DB::table('chi_nhanhs AS cn')
            ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
            ->leftJoin('chi_tiet_san_phams AS ctsp', 'dh.MaDonHang', '=', 'ctsp.MaDonHang')
            ->select('cn.TenChiNhanh',
                    DB::raw('SUM(dh.TongTien) AS TongTien'),
                    DB::raw('SUM(dh.TongTien) - IFNULL(SUM(ctsp.GiaTien), 0) AS LoiNhuan'),
                    DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
            ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.created_at', '>=', $created_at_from)->where('dh.TrangThai','=','DONE')
            ->where('dh.created_at', '<=', $created_at_to)
            ->groupBy('ThoiGian', 'cn.TenChiNhanh');


        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfMonth()->startOfDay();
            $query = DB::table('chi_nhanhs AS cn')
            ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
            ->leftJoin('chi_tiet_san_phams AS ctsp', 'dh.MaDonHang', '=', 'ctsp.MaDonHang')
            ->select('cn.TenChiNhanh',
                    DB::raw('SUM(dh.TongTien) AS TongTien'),
                    DB::raw('SUM(dh.TongTien) - IFNULL(SUM(ctsp.GiaTien), 0), 0) AS LoiNhuan'),
                    DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
            ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.created_at', '>=', $created_at_from)->where('dh.TrangThai','=','DONE')
            ->groupBy('ThoiGian', 'cn.TenChiNhanh');
            // $query->where('created_at', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfMonth()->endOfDay();
            $query = DB::table('chi_nhanhs AS cn')
            ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
            ->leftJoin('chi_tiet_san_phams AS ctsp', 'dh.MaDonHang', '=', 'ctsp.MaDonHang')
            ->select('cn.TenChiNhanh',
                    DB::raw('SUM(dh.TongTien) AS TongTien'),
                    DB::raw('SUM(dh.TongTien) - IFNULL(SUM(ctsp.GiaTien), 0), 0) AS LoiNhuan'),
                    DB::raw("DATE_FORMAT(dh.created_at, '%m/%Y') AS ThoiGian"))
            ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.TrangThai','=','DONE')
            ->where('dh.created_at', '<=', $created_at_to)
            ->groupBy('ThoiGian', 'cn.TenChiNhanh');
            // $query->where('created_at', '<=', $created_at_to);
        }
        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }

    public function layDuLieu12Thang()
    {
        $namHienTai = date('Y');
        $dataOnline = [];
        $dataOffline = [];

        // Biểu đồ doanh thu
        for ($thang = 1; $thang <= 12; $thang++) {
            $startOfMonth = date('Y-m-01', strtotime($namHienTai . '-' . $thang . '-01'));
            $endOfMonth = date('Y-m-t', strtotime($namHienTai . '-' . $thang . '-01'));

            $result = DB::table('don_hangs')
            ->select(DB::raw('SUM(TongTien) as total'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.email', '=', 'don_hangs.NguoiTao')
                    ->where('users.LoaiTaiKhoan', '<>', 'C');
            })
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total')
            ->first();

            $result2 = DB::table('don_hangs')
            ->select(DB::raw('SUM(TongTien) as total'))->where('TrangThai','=','DONE')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.email', '=', 'don_hangs.NguoiTao')
                    ->where('users.LoaiTaiKhoan', '=', 'C');
            })
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total')
            ->first();

            $dataOnline[] = intval($result2) ?? 0;

            $dataOffline[] = intval($result) ?? 0;
        }

        // Biểu đồ tròn
        $query = DB::table('chi_nhanhs AS cn')
        ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
        ->select('cn.TenChiNhanh', DB::raw('COALESCE(SUM(dh.TongTien), 0) AS TongTien'))
        ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.TrangThai','=','DONE')
        ->groupBy('cn.TenChiNhanh');

        $results = $query->get();

        $dataPie = $results->map(function ($item) {
            return [
                'value' => $item->TongTien,
                'name' => $item->TenChiNhanh,
            ];
        });


        // Top 5 người dùng mới
        $users = DB::table('users')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        // Top 5 sản phẩm bán chạy
        $topSanPham = DB::table('chi_tiet_don_hangs')
                ->leftJoin('san_phams AS sp', 'sp.MaSanPham', '=', 'chi_tiet_don_hangs.MaSanPham')
                ->select('sp.TenSanPham', 'sp.GiaTien', 'sp.MaSanPham', 'sp.MoTa', 'sp.HinhAnh', DB::raw('SUM(SoLuong) as SoLuongXuatHien'))
                ->groupBy('MaSanPham', 'sp.TenSanPham', 'sp.GiaTien', 'sp.MaSanPham', 'sp.MoTa', 'sp.HinhAnh')
                ->orderByDesc('SoLuongXuatHien')
                ->limit(5)
                ->get();

        $tongKhachHang = User::where('LoaiTaiKhoan', '=', 'C')->count();
        $tongBan = DB::table('chi_tiet_don_hangs')
                ->select(DB::raw('SUM(SoLuong) as SoLuong'))
                ->first()->SoLuong;
        $tongDH = DB::table('don_hangs')
                        ->select(DB::raw('COUNT(MaDonHang) as Tong'))
                        ->first()->Tong;
        $tongDT = DB::table('don_hangs')
                        ->select(DB::raw('SUM(TongTien) as Tong'))
                        ->first()->Tong;


        $chiNhanhs = DB::table('chi_nhanhs AS cn')
            ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
            ->select('cn.TenChiNhanh')
            ->groupBy('cn.TenChiNhanh')
            ->get();

        $dataArray = [];
        foreach ($chiNhanhs as $chiNhanh) {
            $data = [
                'name' => $chiNhanh->TenChiNhanh,
                'data' => [] // Khởi tạo mảng trống cho dữ liệu của từng chi nhánh
            ];

            // Lấy dữ liệu của từng chi nhánh trong 12 tháng của năm hiện tại
            for ($i = 1; $i <= 12; $i++) {
                $result = DB::table('chi_nhanhs AS cn')
                    ->leftJoin('don_hangs AS dh', 'cn.MaChiNhanh', '=', 'dh.ChiNhanh')
                    ->whereNotNull('dh.MaDonHang')->where('dh.MaDonHang','<>','')->where('dh.TrangThai','=','DONE')
                    ->whereMonth('dh.created_at', $i)
                    ->whereYear('dh.created_at', date('Y'))
                    ->where('cn.TenChiNhanh', $chiNhanh->TenChiNhanh)
                    ->sum('dh.TongTien');

                $data['data'][] = $result ?? 0;
            }

            $dataArray[] = $data;
        }

        return [$dataOffline, $dataOnline, $dataPie, $users, $topSanPham, $tongKhachHang, $tongBan, $tongDH, $tongDT, $dataArray];
    }
}
