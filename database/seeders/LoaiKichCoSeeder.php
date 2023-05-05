<?php

namespace Database\Seeders;

use App\Models\LoaiKichCo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaiKichCoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LCK = new LoaiKichCo();
        $LCK->MaKichCo = "KC01";
        $LCK->TenKichCo = "ml";
        $LCK->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK->GhiChu = "";
        $LCK->save();

        $LCK1 = new LoaiKichCo();
        $LCK1->MaKichCo = "KC02";
        $LCK1->TenKichCo = "set";
        $LCK1->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK1->GhiChu = "";
        $LCK1->save();

        $LCK2 = new LoaiKichCo();
        $LCK2->MaKichCo = "KC03";
        $LCK2->TenKichCo = "cây";
        $LCK2->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK2->GhiChu = "";
        $LCK2->save();


    }
}
