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
            $table->string("TenSanPham")->nullable();
            $table->integer("KichCo")->nullable();
            $table->string("ThuongHieu")->nullable();
            $table->integer("SoLuongNhap")->nullable();
            $table->integer("LoaiNhap")->nullable();
            $table->string("GiaTien")->nullable();
            $table->text("MoTa")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("LoaiSanPham");
            $table->string("LoaiKichCo");
            $table->string("MaKhoHang");
            $table->string("MaChiNhanh");
            $table->text("GhiChu")->nullable();
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
