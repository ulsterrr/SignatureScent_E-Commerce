<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function loadDonHangFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);

        $MaDonHang = $filters['MaDonHang'] ?? null;
        $Email = $filters['Email'] ?? null;
        $HoTen = $filters['HoTen'] ?? null;
        $NguoiTao = $filters['NguoiTao'] ?? null;
        $DiaChi = $filters['DiaChi'] ?? null;
        $QuanHuyen = $filters['QuanHuyen'] ?? null;
        $TinhTHanh = $filters['TinhTHanh'] ?? null;
        $TrangThai = $filters['TrangThai'] ?? null;
        $ChiNhanh = $filters['ChiNhanh'] ?? null;
        $LoaiThanhToan = $filters['LoaiThanhToan'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = DonHang::with('loaiSanPham', 'loaiKichCo')->orderBy('MaDonHang','desc');

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
        if (!empty($NguoiTao)) {
            $query->where(function ($query) use ($NguoiTao) {
                $query->where('NguoiTao', 'LIKE', '%' . $NguoiTao . '%');
            });
        }
        if (!empty($DiaChi)) {
            $query->where(function ($query) use ($DiaChi) {
                $query->where('DiaChi', 'LIKE', '%' . $DiaChi . '%');
            });
        }

        if (!empty($QuanHuyen)) {
            $query->where(function ($query) use ($QuanHuyen) {
                $query->where('QuanHuyen','LIKE', '%' . $QuanHuyen . '%');
            });
        }

        if (!empty($TinhTHanh)) {
            $query->where(function ($query) use ($TinhTHanh) {
                $query->where('TinhTHanh', 'LIKE', '%' . $TinhTHanh . '%' );
            });
        }

        if (!empty($TrangThai)) {
            $query->where(function ($query) use ($TrangThai) {
                $query->where('TinhTrangThaiTHanh', 'LIKE', '%' . $TrangThai . '%' );
            });
        }

        if (!empty($ChiNhanh)) {
            $query->where(function ($query) use ($ChiNhanh) {
                $query->where('TinhTHanh', 'LIKE', '%' . $ChiNhanh . '%' );
            });
        }

        if (!empty($LoaiThanhToan)) {
            $query->where(function ($query) use ($LoaiThanhToan) {
                $query->where('LoaiThanhToan', 'LIKE', '%' . $LoaiThanhToan . '%' );
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
}
