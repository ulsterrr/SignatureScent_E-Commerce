<?php

namespace Database\Seeders;

use App\Models\PhanQuyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhanQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PQ = new PhanQuyen();
        $PQ->MaQuyen = "test";
        $PQ->TenQuyen = "Test quyền middleware";
        $PQ->LoaiTaiKhoan = "A";
        $PQ->URI="";
        $PQ->NguoiTao="admin";
        $PQ->save();

        // tạm thời chưa xử lý phân quyền cho uri có thể set trên giao diện admin
    }
}
