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
            $table->string("MaDonHang")->key();
            $table->string("Email")->nullable();
            $table->string("HoTen")->nullable();
            $table->string("DiaChi")->nullable();
            $table->string("SDT")->nullable();
            $table->string("TinhThanh")->nullable();
            $table->string("QuanHuyen")->nullable();
            $table->text("GhiChu")->nullable();
            $table->string("MaKhuyenMai");
            $table->string("LoaiThanhToan");
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("VanChuyen")->nullable();
            $table->string("ChiNhanh");
            $table->string("NguoiTao");
            $table->integer("MaGioHang");
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
