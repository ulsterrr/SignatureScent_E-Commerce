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
        Schema::create('nhap_hang_mois', function (Blueprint $table) {
            $table->id();
            $table->string("TenSanPham");
            $table->integer("KichCo");
            $table->string("ThuongHieu");
            $table->integer("SoLuongNhap");
            $table->integer("LoaiNhap");
            $table->string("GiaTien");
            $table->string("MoTa");
            $table->string("HinhAnh");
            $table->string("LoaiSanPham");
            $table->string("LoaiKichCo");
            $table->string("MaKhoHang");
            $table->string("MaChiNhanh");
            $table->string("GhiChu");
            $table->string("NguoiTao");
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
        Schema::dropIfExists('nhap_hang_mois');
    }
};
