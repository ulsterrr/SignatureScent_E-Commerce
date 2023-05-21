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
        Schema::create('chi_tiet_dieu_chuyens', function (Blueprint $table) {
            $table->id();
            $table->string("MaCTDieuChuyen")->unique();
            $table->string("MaPhieuDieuChuyen");
            $table->string("MaSanPham");
            $table->string("MaCTSanPham");
            $table->string("TrangThaiHienTai");
            $table->text("GhiChu");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_dieu_chuyens');
    }
};
