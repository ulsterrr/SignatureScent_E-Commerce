<?php

namespace App\Http\Controllers;

use App\Models\GiaoDich;
use App\Models\LichSuXuLy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\ThongBao;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function taoMaKhoaChinh($prefix){
        DB::select('CALL sp_KhoiTaoKyHieu(?, @p_code)', [$prefix]);
        $code = DB::select('SELECT @p_code AS code')[0]->code;
        return $code;
    }
    public function dayThongBaoChoUser($tieuDe, $noiDung, $loaiThongBao, $duongDan, $nguoiNhan)
    {
        $thongBao = new ThongBao();
        $thongBao->TieuDe = $tieuDe;
        $thongBao->NoiDung = $noiDung;
        $thongBao->LoaiThongBao = $loaiThongBao;
        $thongBao->DuongDan = $duongDan;
        $thongBao->NguoiNhan = $nguoiNhan;
        $thongBao->TrangThai = 'NEW';
        $thongBao->ThoiGianXem = Carbon::now('Asia/Ho_Chi_Minh'); // 2018-10-18 21:15:43
        $thongBao->save();
    }

    public function themLichXuLy($noidung,$taiKhoan,$chucNang)
    {
        $lxl = new LichSuXuLy();
        $lxl->NoiDung = $noidung;
        $lxl->TaiKhoan = $taiKhoan;
        $lxl->ChucNang = $chucNang;
        $lxl->ThoiGian = Carbon::now('Asia/Ho_Chi_Minh');
        $lxl->TrangThai = '1';
        $lxl->save();
    }

    public function themGiaoDich($MaGiaoDich,$MaSanPham,$ChucNang,$NoiDung,$SoLuong)
    {
        $GD = new GiaoDich();
        $GD->MaGiaoDich = $MaGiaoDich;
        $GD->MaSanPham = $MaSanPham;
        $GD->ChucNang  = $ChucNang;
        $GD->NoiDung = $NoiDung;
        $GD->TrangThai = '1';
        $GD->SoLuong = $SoLuong;
    }
}
