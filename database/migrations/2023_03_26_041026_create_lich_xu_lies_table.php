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
        Schema::create('lich_xu_lies', function (Blueprint $table) {
            $table->id();
            $table->string("NoiDung");
            $table->string("TaiKhoan");
            $table->string("ChucNang");
            $table->date("ThoiGian");
            $table->date("ThuMuc");
            $table->integer("TrangThai");
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
        Schema::dropIfExists('lich_xu_lies');
    }
};
