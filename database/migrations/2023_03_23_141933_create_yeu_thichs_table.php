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
        Schema::create('yeu_thichs', function (Blueprint $table) {
            $table->id();
            $table->string("TenSanPham")->nullable();
            $table->string("MaSanPham");
            $table->string("NguoiThich");
            $table->integer("TrangThai")->nullable();
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
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
        Schema::dropIfExists('yeu_thichs');
    }
};