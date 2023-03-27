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
            $table->string("MaChiNhanh");
            $table->string("TenChiNhanh");
            $table->string("DiaChi");
            $table->string("TinhThanh");
            $table->string("QuanHuyen");
            $table->timestamps("NgayTao");
            $table->timestamps("NgayCapNhat");
            $table->string("SDT1");
            $table->string("SDT2");
            $table->string("SDT3");
            $table->string("FAX");
            $table->string("SoTaiKhoan");
            $table->string("MoMo");
            $table->string("NguoiQuanLy");
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
