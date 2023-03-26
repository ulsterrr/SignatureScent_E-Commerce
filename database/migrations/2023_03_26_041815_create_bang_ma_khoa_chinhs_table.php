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
        Schema::create('bang_ma_khoa_chinhs', function (Blueprint $table) {
            $table->string("MaKhoaChinh");
            $table->integer("GiaTriHienTai");
            $table->string("TenGiaTri");
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
        Schema::dropIfExists('bang_ma_khoa_chinhs');
    }
};
