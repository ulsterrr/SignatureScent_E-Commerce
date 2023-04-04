<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i < 10;$i++){
            $TaiKhoan =  new User();
            $TaiKhoan->name = "Phúc";
            $TaiKhoan->email = "phuc@gmail.com";
            $TaiKhoan->password = Hash::make("26102001");
            $TaiKhoan->LoaiTaiKhoan = "A";
            $TaiKhoan->HoTen = "Hồ Thanh Phúc";
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Vĩnh Lộc ";
            $TaiKhoan->SDT = "0702267843";
            $TaiKhoan->QuanHuyen = "Bình Chánh";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "ToanQuyen";
            $TaiKhoan->NgaySinh = "2001/10/26";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "";
            $TaiKhoan->MaGiaoDien = "1";
            $TaiKhoan->save();
        // }

            $TaiKhoan =  new User();
            $TaiKhoan->name = "Khiêm";
            $TaiKhoan->email = "khiem@gmail.com";
            $TaiKhoan->password = Hash::make("23102000");
            $TaiKhoan->LoaiTaiKhoan = "A";
            $TaiKhoan->HoTen = "Gia Khiêm";
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Quận 6";
            $TaiKhoan->SDT = "0327772310";
            $TaiKhoan->QuanHuyen = "Quận 6";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "HCM";
            $TaiKhoan->NgaySinh = "2001/10/23";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "";
            $TaiKhoan->MaGiaoDien = "1";
            $TaiKhoan->save();

            $TaiKhoan =  new User();
            $TaiKhoan->name = "Khách";
            $TaiKhoan->email = "clienttest@gmail.com";
            $TaiKhoan->password = Hash::make("123456");
            $TaiKhoan->LoaiTaiKhoan = "C";
            $TaiKhoan->HoTen = "Khách test";
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Quận 16";
            $TaiKhoan->SDT = "0327772310";
            $TaiKhoan->QuanHuyen = "Quận 16";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "HCM";
            $TaiKhoan->NgaySinh = "2016/10/16";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "";
            $TaiKhoan->MaGiaoDien = "1";
            $TaiKhoan->save();

    }
}
