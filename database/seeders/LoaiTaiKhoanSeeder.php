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

        $LTK = new LoaiTaiKhoan();
        $LTK->MaLoai = "C";
        $LTK->TenLoai = "Client";
        $LTK->GhiChu = "Khách hàng bình thường, mua sắm, thanh toán, thích sản phẩm, xem giỏ hàng, đơn hàng của bản thân";
        $LTK->NguoiTao = "admin";
        $LTK->save();

        $LTK = new LoaiTaiKhoan();
        $LTK->MaLoai = "M";
        $LTK->TenLoai = "Manager";
        $LTK->GhiChu = "Quản lý của chi nhánh, nhập hàng, nhập kho, xem thống kê của chi nhánh đó";
        $LTK->NguoiTao = "admin";
        $LTK->save();

        $LTK = new LoaiTaiKhoan();
        $LTK->MaLoai = "V";
        $LTK->TenLoai = "VIP";
        $LTK->GhiChu = "Khách hàng đã có thâm niên và chi tiêu vượt định mức hệ thống đưa ra, được quyền mua sản phẩm đặt biệt, giảm giá, nhiều coupon";
        $LTK->NguoiTao = "admin";
        $LTK->save();
    }
}
