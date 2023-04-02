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
        Schema::create('loai_tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->tinyText("MaLoai")->unique();
            $table->string("TenLoai")->nullable();
            $table->text("GhiChu")->nullable();
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
        Schema::dropIfExists('loai_tai_khoans');
    }
};
