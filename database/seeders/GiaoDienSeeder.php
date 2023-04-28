<?php

namespace Database\Seeders;

use App\Models\GiaoDien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GiaoDienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $GD = new GiaoDien();
        $GD->MaGiaoDien = "GD01";
        $GD->MauSac = "";
        $GD->ThuMuc = "";
        $GD->TenGiaoDien= "GiaoDienAdmin";
        $GD->save();

        $GD1 = new GiaoDien();
        $GD1->MaGiaoDien = "GD02";
        $GD1->MauSac = "";
        $GD1->ThuMuc = "";
        $GD1->TenGiaoDien= "GiaoDienQuanLy";
        $GD1->save();

        $GD2 = new GiaoDien();
        $GD2->MaGiaoDien = "GD03";
        $GD2->MauSac = "";
        $GD2->ThuMuc = "";
        $GD2->TenGiaoDien= "GiaoDienNhanVien";
        $GD2->save();

        $GD3 = new GiaoDien();
        $GD3->MaGiaoDien = "GD04";
        $GD3->MauSac = "";
        $GD3->ThuMuc = "";
        $GD3->TenGiaoDien= "GiaoDienKhachHang";
        $GD3->save();
    }
}
