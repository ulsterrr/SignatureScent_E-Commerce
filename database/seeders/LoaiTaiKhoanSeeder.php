<?php

namespace Database\Seeders;

use App\Models\LoaiTaiKhoan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LTK = new LoaiTaiKhoan;
        $LTK->TenLoai = "Admin";
        $LTK->GhiChu = "Được toàn quyền sử dụng hệ thống";
        $LTK->NguoiTao = "";
        $LTK->save();
    }
}
