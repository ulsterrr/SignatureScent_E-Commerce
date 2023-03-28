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
            $table->string("MaDonHang");
            $table->string("Email");
            $table->string("HoTen");
            $table->string("DiaChi");
            $table->string("SDT");
            $table->string("TinhThanh");
            $table->string("QuanHuyen");
            $table->string("GhiChu");
            $table->string("MaKhuyenMai");
            $table->string("LoaiThanhToan");
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("VanChuyen");
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
