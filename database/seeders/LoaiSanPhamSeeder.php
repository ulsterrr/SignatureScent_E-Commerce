<?php

namespace Database\Seeders;

use App\Models\LoaiSanPham;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaiSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LSP = new LoaiSanPham();
        $LSP->MaLoai = "LSP01";
        $LSP->TenLoai = "Nước hoa nam";
        $LSP->GhiChu = "Nước hoa dành cho nam giới";
        $LSP->NguoiTao = "";
        $LSP->save();

        $LSP1 = new LoaiSanPham();
        $LSP1->MaLoai = "LSP02";
        $LSP1->TenLoai = "Nước hoa nữ";
        $LSP1->GhiChu = "Nước hoa dành cho nữ giới";
        $LSP1->NguoiTao = "";
        $LSP1->save();

        $LSP2 = new LoaiSanPham();
        $LSP2->MaLoai = "LSP03";
        $LSP2->TenLoai = "Nước hoa unisex";
        $LSP2->GhiChu = "Nước hoa dành cho cả nam và nữ";
        $LSP2->NguoiTao = "";
        $LSP2->save();

        $LSP3 = new LoaiSanPham();
        $LSP3->MaLoai = "LSP04";
        $LSP3->TenLoai = "Son";
        $LSP3->GhiChu = "Nước hoa dành cho cả nam và nữ";
        $LSP3->NguoiTao = "";
        $LSP3->save();

        $LSP4 = new LoaiSanPham();
        $LSP4->MaLoai = "LSP05";
        $LSP4->TenLoai = "Nước hoa niche nam";
        $LSP4->GhiChu = "Nước hoa dành cho nam ";
        $LSP4->NguoiTao = "";
        $LSP4->save();

        $LSP5 = new LoaiSanPham();
        $LSP5->MaLoai = "LSP06";
        $LSP5->TenLoai = "Nước hoa niche nữ";
        $LSP5->GhiChu = "Nước hoa dành cho nữ ";
        $LSP5->NguoiTao = "";
        $LSP5->save();
    }

}

