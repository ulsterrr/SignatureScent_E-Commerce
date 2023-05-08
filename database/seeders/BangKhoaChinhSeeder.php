<?php

namespace Database\Seeders;

use App\Models\BangMaKhoaChinh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BangKhoaChinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $MA = new BangMaKhoaChinh();
        $MA->MaKhoaChinh = 'SP';
        $MA->GiaTriHienTai = 1;
        $MA->TenGiaTri = 'Mã sản phẩm';
        $MA->TrangThai = 1;
        $MA->save();

        $MACT = new BangMaKhoaChinh();
        $MACT->MaKhoaChinh = 'CTSP';
        $MACT->GiaTriHienTai = 1;
        $MACT->TenGiaTri = 'Chi tiết sản phẩm';
        $MACT->TrangThai = 1;
        $MACT->save();

        $MAPN = new BangMaKhoaChinh();
        $MAPN->MaKhoaChinh = 'NHM';
        $MAPN->GiaTriHienTai = 1;
        $MAPN->TenGiaTri = 'Nhập mới sản phẩm';
        $MAPN->TrangThai = 1;
        $MAPN->save();
    }
}
