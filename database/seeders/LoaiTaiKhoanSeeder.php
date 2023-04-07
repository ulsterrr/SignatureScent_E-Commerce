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
        $LTK = new LoaiTaiKhoan();
        $LTK->MaLoai = "A";
        $LTK->TenLoai = "Administrator";
        $LTK->GhiChu = "Được toàn quyền sử dụng hệ thống";
        $LTK->NguoiTao = "null";
        $LTK->save();

        $LTK1 = new LoaiTaiKhoan();
        $LTK1->MaLoai = "C";
        $LTK1->TenLoai = "Client";
        $LTK1->GhiChu = "Khách hàng bình thường, mua sắm, thanh toán, thích sản phẩm, xem giỏ hàng, đơn hàng của bản thân";
        $LTK1->NguoiTao = "admin";
        $LTK1->save();

        $LTK2 = new LoaiTaiKhoan();
        $LTK2->MaLoai = "M";
        $LTK2->TenLoai = "Manager";
        $LTK2->GhiChu = "Quản lý của chi nhánh, nhập hàng, nhập kho, xem thống kê của chi nhánh đó";
        $LTK2->NguoiTao = "admin";
        $LTK2->save();

        $LTK3 = new LoaiTaiKhoan();
        $LTK3->MaLoai = "V";
        $LTK3->TenLoai = "VIP";
        $LTK3->GhiChu = "Khách hàng đã có thâm niên và chi tiêu vượt định mức hệ thống đưa ra, được quyền mua sản phẩm đặt biệt, giảm giá, nhiều coupon";
        $LTK3->NguoiTao = "admin";
        $LTK3->save();
    }
}
