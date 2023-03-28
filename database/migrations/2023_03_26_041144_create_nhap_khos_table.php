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
        Schema::create('nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->string("MaSanPham");
            $table->string("MaChiNhanh");
            $table->integer("SoLuongNhap");
            $table->string("GhiChu");
            $table->string("NguoiTao");
            $table->string("MaKhoHang");
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
        Schema::dropIfExists('nhap_khos');
    }
};