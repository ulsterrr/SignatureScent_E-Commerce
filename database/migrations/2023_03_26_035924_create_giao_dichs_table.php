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
        Schema::create('giao_dichs', function (Blueprint $table) {
            $table->id();
            $table->string("MaGiaoDich")->unique();
            $table->string("MaSanPham");
            $table->string("ChucNang")->nullable();
            $table->text("NoiDung")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->integer("SoLuong")->nullable();
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
        Schema::dropIfExists('giao_dichs');
    }
};
