<?php

namespace Database\Seeders;

use App\Models\PhanQuyen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhanQuyenM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PQ2 = new PhanQuyen();
        $PQ2->MaQuyen = "dashboard";
        $PQ2->TenQuyen = "Truy cập bảng điều khiển";
        $PQ2->LoaiTaiKhoan = "M";
        $PQ2->URI="";
        $PQ2->TrangThai=1; // 0 là huỷ, 1 là kích hoạt
        $PQ2->NguoiTao="admin";
        $PQ2->save();

        $PQ3 = new PhanQuyen();
        $PQ3->MaQuyen = "danhmuc";
        $PQ3->TenQuyen = "Quản lý danh mục";
        $PQ3->LoaiTaiKhoan = "M";
        $PQ3->URI="";
        $PQ3->TrangThai=1; // 0 là huỷ, 1 là kích hoạt
        $PQ3->NguoiTao="admin";
        $PQ3->save();

        $PQ4 = new PhanQuyen();
        $PQ4->MaQuyen = "khohang";
        $PQ4->TenQuyen = "Quản lý kho hàng";
        $PQ4->LoaiTaiKhoan = "M";
        $PQ4->URI="";
        $PQ4->TrangThai=1; // 0 là huỷ, 1 là kích hoạt
        $PQ4->NguoiTao="admin";
        $PQ4->save();

        $PQ5 = new PhanQuyen();
        $PQ5->MaQuyen = "banhang";
        $PQ5->TenQuyen = "Quản lý bán hàng";
        $PQ5->LoaiTaiKhoan = "M";
        $PQ5->URI="";
        $PQ5->TrangThai=1; // 0 là huỷ, 1 là kích hoạt
        $PQ5->NguoiTao="admin";
        $PQ5->save();

        $PQ6 = new PhanQuyen();
        $PQ6->MaQuyen = "thongke";
        $PQ6->TenQuyen = "Trang thống kê";
        $PQ6->LoaiTaiKhoan = "M";
        $PQ6->URI="";
        $PQ6->TrangThai=1; // 0 là huỷ, 1 là kích hoạt
        $PQ6->NguoiTao="admin";
        $PQ6->save();
    }
}
