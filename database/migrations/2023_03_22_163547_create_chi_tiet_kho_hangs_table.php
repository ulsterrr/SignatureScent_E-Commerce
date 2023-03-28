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
        Schema::create('chi_tiet_kho_hangs', function (Blueprint $table) {
            $table->id();
            $table->string("MaKhoHang");
            $table->string("MaSanPham");
            $table->string("TenSanPham");
            $table->string("SoLuong");
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
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
        Schema::dropIfExists('chi_tiet_kho_hangs');
    }
};
