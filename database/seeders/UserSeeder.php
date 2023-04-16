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
            $TaiKhoan->AnhDaiDien = "";
            $TaiKhoan->AnhBia = "";
            $TaiKhoan->save();
        // }

            $TaiKhoan1 =  new User();
            $TaiKhoan1->name = "Khiêm";
            $TaiKhoan1->email = "khiem@gmail.com";
            $TaiKhoan1->password = Hash::make("23102000");
            $TaiKhoan1->LoaiTaiKhoan = "A";
            $TaiKhoan1->HoTen = "Gia Khiêm";
            $TaiKhoan1->GioiTinh = "Nam";
            $TaiKhoan1->DiaChi = "Quận 6";
            $TaiKhoan1->SDT = "0327772310";
            $TaiKhoan1->QuanHuyen = "Quận 6";
            $TaiKhoan1->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan1->ChiNhanh = "HCM";
            $TaiKhoan1->NgaySinh = "2001/10/23";
            $TaiKhoan1->TrangThai = "1";
            $TaiKhoan1->NguoiTao = "";
            $TaiKhoan1->MaGiaoDien = "1";
            $TaiKhoan1->AnhDaiDien = "";
            $TaiKhoan1->AnhBia = "";
            $TaiKhoan1->save();

            $TaiKhoan2 =  new User();
            $TaiKhoan2->name = "Khách";
            $TaiKhoan2->email = "clienttest@gmail.com";
            $TaiKhoan2->password = Hash::make("123456");
            $TaiKhoan2->LoaiTaiKhoan = "C";
            $TaiKhoan2->HoTen = "Khách test";
            $TaiKhoan2->GioiTinh = "Nam";
            $TaiKhoan2->DiaChi = "Quận 16";
            $TaiKhoan2->SDT = "0327772310";
            $TaiKhoan2->QuanHuyen = "Quận 16";
            $TaiKhoan2->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan2->ChiNhanh = "HCM";
            $TaiKhoan2->NgaySinh = "2016/10/16";
            $TaiKhoan2->TrangThai = "1";
            $TaiKhoan2->NguoiTao = "";
            $TaiKhoan2->MaGiaoDien = "1";
            $TaiKhoan2->AnhDaiDien = "";
            $TaiKhoan2->AnhBia = "";
            $TaiKhoan2->save();

    }
}
