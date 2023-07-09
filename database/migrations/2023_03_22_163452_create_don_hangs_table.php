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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string("MaDonHang")->unique();
            $table->string("Email")->nullable();
            $table->string("HoTen")->nullable();
            $table->string("DiaChi")->nullable();
            $table->string("SDT")->nullable();
            $table->string("TinhThanh")->nullable();
            $table->string("QuanHuyen")->nullable();
            $table->text("GhiChu")->nullable();
            $table->decimal("TongTien", 18, 0)->nullable();
            $table->string("MaKhuyenMai")->nullable();
            $table->string("LoaiThanhToan");
            $table->string("VanChuyen")->nullable();
            $table->string("ChiNhanh")->nullable();
            $table->string("NguoiTao")->nullable();
            $table->string("TrangThai")->nullable();
            $table->integer("MaGioHang")->nullable();
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
        Schema::dropIfExists('don_hangs');
    }
};
