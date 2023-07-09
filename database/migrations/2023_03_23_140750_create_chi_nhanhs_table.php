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
        Schema::create('chi_nhanhs', function (Blueprint $table) {
            $table->id();
            $table->string("MaChiNhanh")->unique();
            $table->string("TenChiNhanh")->nullable();
            $table->string("DiaChi")->nullable();
            $table->string("TinhThanh")->nullable();
            $table->string("QuanHuyen")->nullable();
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("SDT1")->nullable();
            $table->string("SDT2")->nullable();
            $table->string("SDT3")->nullable();
            $table->string("FAX")->nullable();
            $table->string("SoTaiKhoan")->nullable();
            $table->string("MoMo")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("NguoiQuanLy")->nullable();
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
        Schema::dropIfExists('chi_nhanhs');
    }
};
