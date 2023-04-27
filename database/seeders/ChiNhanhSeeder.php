<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChiNhanh;


class ChiNhanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CN = new ChiNhanh();
        $CN->MaChiNhanh = "CN01";
        $CN->TenChiNhanh = "Chi Nhánh 1";
        $CN-> DiaChi = "420/6 Lê Văn Sỹ, Phường 14";
        $CN->TinhThanh = "Hồ Chí Minh";
        $CN->QuanHuyen = "Quận 3";
        $CN->SDT1 = "0702268843";
        $CN->SDT2 = "0786957811";
        $CN->SDT3 = "0702267843";
        $CN->FAX = "";
        $CN->SoTaiKhoan = "0010141760802";
        $CN->MoMo = "0702267843";
        $CN->NguoiQuanLy = "Hồ Thanh Phúc";
        $CN->save();

        $CN1 = new ChiNhanh();
        $CN1->MaChiNhanh = "CN02";
        $CN1->TenChiNhanh = "Chi Nhánh 2";
        $CN1-> DiaChi = "1379-1381 Đường 3/2, Phường 16";
        $CN1->TinhThanh = "Hồ Chí Minh";
        $CN1->QuanHuyen = "Quận 11";
        $CN1->SDT1 = "0702268843";
        $CN1->SDT2 = "0786957811";
        $CN1->SDT3 = "0702267843";
        $CN1->FAX = "";
        $CN1->SoTaiKhoan = "0010141760802";
        $CN1->MoMo = "0702267843";
        $CN1->NguoiQuanLy = "Hồ Thanh Phúc";
        $CN1->save();

        $CN2 = new ChiNhanh();
        $CN2->MaChiNhanh = "CN03";
        $CN2->TenChiNhanh = "Chi Nhánh 3";
        $CN2-> DiaChi = "145-47 CMT8, Phường Bến Thành";
        $CN2->TinhThanh = "Hồ Chí Minh";
        $CN2->QuanHuyen = "Quận 1";
        $CN2->SDT1 = "0702268843";
        $CN2->SDT2 = "0786957811";
        $CN2->SDT3 = "0702267843";
        $CN2->FAX = "";
        $CN2->SoTaiKhoan = "0010141760802";
        $CN2->MoMo = "0702267843";
        $CN2->NguoiQuanLy = "Cao Hoàng Gia Khiêm";
        $CN2->save();
        
        $CN3 = new ChiNhanh();
        $CN3->MaChiNhanh = "CN04";
        $CN3->TenChiNhanh = "Chi Nhánh 4";
        $CN3-> DiaChi = "366A18 Phan Văn Trị, Phường 05";
        $CN3->TinhThanh = "Hồ Chí Minh";
        $CN3->QuanHuyen = "Quận Gò Vấp";
        $CN3->SDT1 = "0702268843";
        $CN3->SDT2 = "0786957811";
        $CN3->SDT3 = "0702267843";
        $CN3->FAX = "";
        $CN3->SoTaiKhoan = "0010141760802";
        $CN3->MoMo = "0702267843";
        $CN3->NguoiQuanLy = "Cao Hoàng Gia Khiêm";
        $CN3->save();
        



    }
}
