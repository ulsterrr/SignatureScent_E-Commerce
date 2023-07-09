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
            $table->string("MaPhieuNhap")->unique();
            $table->string("MaSanPham");
            $table->string("TenSanPham")->nullable();
            $table->string("KichCo")->nullable();
            $table->string("ThuongHieu")->nullable();
            $table->integer("SoLuongNhap")->nullable();
            $table->string("LoaiNhap")->nullable();
            $table->decimal("VAT", 18, 0)->nullable();
            $table->decimal("GiaVAT", 18, 0)->nullable();
            $table->decimal("GiaTien", 18, 0)->nullable();
            $table->decimal("GiaTienSauThue", 18, 0)->nullable();
            $table->decimal("TongTien", 18, 0)->nullable();
            $table->text("MoTa")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("LoaiSanPham")->nullable();
            $table->string("LoaiKichCo")->nullable();
            $table->string("MaKhoHang")->nullable();
            $table->string("MaChiNhanh")->nullable();
            $table->text("GhiChu")->nullable();
            $table->text("SoSerial")->nullable();
            $table->integer("SoLuongSerial")->nullable();
            $table->string("NguoiTao")->nullable();
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
