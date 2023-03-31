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
        Schema::create('dieu_chuyens', function (Blueprint $table) {
            $table->id();
            $table->string("LyDoDieuChuyen")->nullable();
            $table->string("ChiNhanhHienTai");
            $table->string("ChiNhanhDieuChuyen");
            $table->string("MaSanPham");
            $table->string("MaChiTietSP");
            $table->date("NgayDieuChuyen")->nullable();
            $table->string("NguoiDieuChuyen");
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
        Schema::dropIfExists('dieu_chuyens');
    }
};
