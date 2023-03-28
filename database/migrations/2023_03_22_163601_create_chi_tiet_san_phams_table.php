<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("MaSanPham");
            $table->string("SoSerial");
            $table->string("MaChiNhanh");
            $table->string("TinhTrang");
            $table->string("GhiChu");
            $table->string("NguoiTao");
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("MaDonHang");
            $table->string("MaPhieuNhap");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_san_phams');
    }
};
