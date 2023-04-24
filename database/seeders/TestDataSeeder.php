<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i < 10000;$i++){
            $TaiKhoan =  new User();
            $TaiKhoan->name = "Test".$i;
            $TaiKhoan->email = "test".$i."@gmail.com";
            $TaiKhoan->password = Hash::make("123456");
            $TaiKhoan->LoaiTaiKhoan = "A";
            $TaiKhoan->HoTen = "Test".$i;
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Vĩnh Lộc B";
            $TaiKhoan->SDT = "2354236233";
            $TaiKhoan->QuanHuyen = "Bình Chánh";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "ToanQuyen";
            $TaiKhoan->NgaySinh = "2000/10/26";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "admin";
            $TaiKhoan->MaGiaoDien = "1";
            $TaiKhoan->AnhDaiDien = "";
            $TaiKhoan->AnhBia = "";
            $TaiKhoan->save();
        }
    }
}
