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
            $table->string("TenTaiKhoan")->unique();
            $table->tinyText("LoaiTaiKhoan");
            $table->string("HoTen")->nullable();
            $table->string("MatKhau")->nullable();
            $table->string("GioiTinh")->nullable();
            $table->string("DiaChi")->nullable();
            $table->string("SDT")->nullable();
            $table->string("QuanHuyen")->nullable();
            $table->string("TinhThanh")->nullable();
            $table->string("ChiNhanh");
            $table->date("NgaySinh")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->string("NguoiTao");
            $table->integer("Xoa");
            $table->softDeletes();
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
