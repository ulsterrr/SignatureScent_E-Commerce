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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string("MaCTDonHang")->unique();
            $table->string("MaDonHang");
            $table->string("MaSanPham");
            $table->decimal("SoLuong", 18, 0)->nullable();
            $table->decimal("GiaTien", 18, 0)->nullable();
            $table->decimal("TongTien", 18, 0)->nullable();
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
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
