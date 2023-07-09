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
        Schema::create('dieu_chuyens', function (Blueprint $table) {
            $table->id();
            $table->string("MaPhieuDieuChuyen")->unique();
            $table->string("LyDoDieuChuyen")->nullable();
            $table->string("ChiNhanhHienTai")->nullable();
            $table->string("ChiNhanhDieuChuyen")->nullable();
            $table->date("NgayDieuChuyen")->nullable();
            $table->string("NguoiDieuChuyen")->nullable();
            $table->string("TrangThai")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dieu_chuyens');
    }
};
