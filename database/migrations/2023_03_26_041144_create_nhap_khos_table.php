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
            $table->string("MaNhapKho")->unique();
            $table->string("MaSanPham");
            $table->string("MaChiNhanh")->nullable();
            $table->text("SoSerial")->nullable();
            $table->integer("SoLuongNhap")->nullable();
            $table->string("KichCo")->nullable();
            $table->decimal("TongTien", 18, 0)->nullable();
            $table->text("GhiChu")->nullable();
            $table->string("NguoiTao")->nullable();
            $table->string("MaKhoHang")->nullable();
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
        Schema::dropIfExists('nhap_khos');
    }
};
