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
        Schema::create('doi_tra_san_phams', function (Blueprint $table) {
            $table->id();
            $table->string("MaDonhang");
            $table->string("ChiTietSPHienTai")->nullable();
            $table->string("ChiTietSPDoiMoi")->nullable();
            $table->integer("LoaiDoiTra")->nullable();
            $table->text("LyDo")->nullable();
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
        Schema::dropIfExists('doi_tra_san_phams');
    }
};
