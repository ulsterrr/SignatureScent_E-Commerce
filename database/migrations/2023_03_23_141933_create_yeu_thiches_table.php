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
        Schema::create('yeu_thiches', function (Blueprint $table) {
            $table->id();
            $table->string("TenSanPham");
            $table->string("MaSanPham");
            $table->string("NguoiThich");
            $table->integer("TrangThai");
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
        Schema::dropIfExists('yeu_thiches');
    }
};
