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
            $table->string("MaCTSanPham")->unique();
            $table->string("MaSanPham");
            $table->string("SoSerial")->nullable();
            $table->string("KichCo")->nullable();
            $table->string("MaChiNhanh")->nullable();
            $table->string("TinhTrang")->nullable();
            $table->text("GhiChu")->nullable();
            $table->string("NguoiTao")->nullable();
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("MaDonHang")->nullable();
            $table->string("MaPhieuNhap")->nullable();
            $table->softDeletes();
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
