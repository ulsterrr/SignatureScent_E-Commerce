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
        Schema::create('giam_gia_san_phams', function (Blueprint $table) {
            $table->id();
            $table->tinyText("MaSanPham")->unique();
            $table->string("PhanTramGiam")->nullable();
            $table->text("TrangThai")->nullable();
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
        Schema::dropIfExists('giam_gia_san_phams');
    }
};
