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
        $LCK->TenKichCo = "100ml";
        $LCK->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK->GhiChu = "";
        $LCK->save();

        $LCK1 = new LoaiKichCo();
        $LCK1->MaKichCo = "KC02";
        $LCK1->TenKichCo = "95ml";
        $LCK1->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK1->GhiChu = "";
        $LCK1->save();

        $LCK2 = new LoaiKichCo();
        $LCK2->MaKichCo = "KC03";
        $LCK2->TenKichCo = "90ml";
        $LCK2->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK2->GhiChu = "";
        $LCK2->save();

        $LCK3 = new LoaiKichCo();
        $LCK3->MaKichCo = "KC04";
        $LCK3->TenKichCo = "85ml";
        $LCK3->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK3->GhiChu = "";
        $LCK3->save();

        $LCK4 = new LoaiKichCo();
        $LCK4->MaKichCo = "KC05";
        $LCK4->TenKichCo = "80ml";
        $LCK4->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK4->GhiChu = "";
        $LCK4->save();

        $LCK5 = new LoaiKichCo();
        $LCK5->MaKichCo = "KC06";
        $LCK5->TenKichCo = "75ml";
        $LCK5->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK5->GhiChu = "";
        $LCK5->save();

        $LCK6 = new LoaiKichCo();
        $LCK6->MaKichCo = "KC07";
        $LCK6->TenKichCo = "70ml";
        $LCK6->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK6->GhiChu = "";
        $LCK6->save();

        $LCK7 = new LoaiKichCo();
        $LCK7->MaKichCo = "KC08";
        $LCK7->TenKichCo = "50ml";
        $LCK7->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK7->GhiChu = "";
        $LCK7->save();

        $LCK8 = new LoaiKichCo();
        $LCK8->MaKichCo = "KC09";
        $LCK8->TenKichCo = "30ml";
        $LCK8->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK8->GhiChu = "";
        $LCK8->save();

        $LCK9 = new LoaiKichCo();
        $LCK9->MaKichCo = "KC10";
        $LCK9->TenKichCo = "10ml";
        $LCK9->NguoiTao = "hothanhphuc2468@gmail.com";
        $LCK9->GhiChu = "";
        $LCK9->save();
    }
}
