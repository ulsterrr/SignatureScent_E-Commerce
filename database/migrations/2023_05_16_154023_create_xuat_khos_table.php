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
        Schema::create('xuat_khos', function (Blueprint $table) {
            $table->id();
            $table->string("MaXuatKho")->unique();
            $table->string("LyDoXuat")->nullable();
            $table->string("ChiNhanhNhan")->nullable();
            $table->date("NgayXuat")->nullable();
            $table->string("NguoiXuatKho");
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
        Schema::dropIfExists('xuat_khos');
    }
};
