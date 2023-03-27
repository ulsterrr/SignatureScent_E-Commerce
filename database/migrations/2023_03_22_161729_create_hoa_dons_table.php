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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->string("MaHoaDon");
            $table->string("MaDonHang");
            $table->string("SoLuong");
            $table->string("GiaTien");
            $table->string("TongTien");
            $table->string("TenSanPham");
            $table->timestamps("NgayTao");
            $table->timestamps("NgayCapNhat");
            $table->string("NguoiTao");
            $table->string("MaDonHang");
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
        Schema::dropIfExists('hoa_dons');
    }
};
