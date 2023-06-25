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
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->string("MaKhuyenMai")->unique();
            $table->text("NoiDung")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->integer("GiaTri")->default(0);
            $table->integer("SoLuong")->nullable();
            $table->string("NguoiTao");
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
        Schema::dropIfExists('khuyen_mais');
    }
};
