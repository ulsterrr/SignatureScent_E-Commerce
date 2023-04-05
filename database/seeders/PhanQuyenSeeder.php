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
        $PQ->LoaiTaiKhoan = "1";
        $PQ->URL="";
        $PQ->NguoiTao="";
        $PQ->save();

        // tạm thời chưa xử lý phân quyền cho uri có thể set trên giao diện admin
    }
}
