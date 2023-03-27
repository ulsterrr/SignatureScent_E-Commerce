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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string("TenTaiKhoan");
            $table->integer("LoaiNguoiDung");
            $table->string("HoTen");
            $table->string("MatKhau");
            $table->string("GioiTinh");
            $table->string("DiaChi");
            $table->string("SDT");
            $table->string("QuanHuyen");
            $table->string("TinhThanh");
            $table->string("ChiNhanh");
            $table->date("NgaySinh");
            $table->integer("TrangThai");
            $table->string("NguoiTao");
            $table->int("Xoa");
            $table->string("MaGiaoDien");
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
        Schema::dropIfExists('tai_khoans');
    }
};
