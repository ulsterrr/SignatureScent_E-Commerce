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
        Schema::create('giao_diens', function (Blueprint $table) {
            $table->id();
            $table->string("MaGiaoDien");
            $table->string("MauSac");
            $table->string("DuongDanGD");
            $table->string("ThuMuc");
            $table->integer("TenGiaoDien");
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
        Schema::dropIfExists('giao_diens');
    }
};