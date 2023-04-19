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
    }
}
