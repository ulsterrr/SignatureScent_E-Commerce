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
        Schema::create('kho_hangs', function (Blueprint $table) {
            $table->id();
            $table->string("TenKho")->nullable();
            $table->string("ChiNhanh")->nullable();
            $table->string("NguoiQuanLy")->nullable();
            $table->date("ThoiGian")->nullable();
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
        Schema::dropIfExists('kho_hangs');
    }
};
