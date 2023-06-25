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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('email_verification_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyText("LoaiTaiKhoan");
            $table->string("HoTen")->nullable();
            $table->string("GioiTinh")->nullable();
            $table->string("DiaChi")->nullable();
            $table->string("SDT")->nullable();
            $table->string("QuanHuyen")->nullable();
            $table->string("TinhThanh")->nullable();
            $table->string("ChiNhanh")->nullable();
            $table->dateTime("NgaySinh")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->string("NguoiTao")->nullable();
            $table->softDeletes();
            $table->string("MaGiaoDien")->nullable();
            $table->string("AnhDaiDien")->nullable();
            $table->string("KMSD")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
