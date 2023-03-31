<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i < 10;$i++){
             $TaiKhoan =  new TaiKhoan;
            $TaiKhoan->TenTaiKhoan = "Phuc123";
            $TaiKhoan->LoaiNguoiDung = "1";
            $TaiKhoan->HoTen = "Hồ Thanh Phúc";
            $TaiKhoan->MatKhau = Hash::make("26102001");
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Vĩnh Lộc ";
            $TaiKhoan->SDT = "0702267843";
            $TaiKhoan->QuanHuyen = "Bình Chánh";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "ToanQuyen";
            $TaiKhoan->NgaySinh = "2001/10/26";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "";
            $TaiKhoan->Xoa = "0";
            $TaiKhoan->MaGiaoDien = "1";
            $TaiKhoan->save();
        // }

    }
}
