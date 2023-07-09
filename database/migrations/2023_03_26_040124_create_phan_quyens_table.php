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
        Schema::create('phan_quyens', function (Blueprint $table) {
            $table->id();
            $table->string("MaQuyen");
            $table->string("TenQuyen")->nullable();
            $table->string("LoaiTaiKhoan");
            $table->string("URI")->nullable();
            $table->integer("TrangThai")->nullable();
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
        Schema::dropIfExists('phan_quyens');
    }
};
