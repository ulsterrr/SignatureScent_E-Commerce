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

        $MADC = new BangMaKhoaChinh();
        $MADC->MaKhoaChinh = 'PDC';
        $MADC->GiaTriHienTai = 1;
        $MADC->TenGiaTri = 'Điều chuyển sản phẩm';
        $MADC->TrangThai = 1;
        $MADC->save();

        $MACTDC = new BangMaKhoaChinh();
        $MACTDC->MaKhoaChinh = 'CTDC';
        $MACTDC->GiaTriHienTai = 1;
        $MACTDC->TenGiaTri = 'Chi tiết điều chuyển sản phẩm';
        $MACTDC->TrangThai = 1;
        $MACTDC->save();
    }
}
