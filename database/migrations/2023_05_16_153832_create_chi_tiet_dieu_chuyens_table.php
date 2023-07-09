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
            $table->string("MaPhieuDieuChuyen")->nullable();
            $table->string("MaSanPham")->nullable();
            $table->string("MaCTSanPham")->nullable();
            $table->string("TrangThaiHienTai")->nullable();
            $table->text("GhiChu")->nullable();
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
