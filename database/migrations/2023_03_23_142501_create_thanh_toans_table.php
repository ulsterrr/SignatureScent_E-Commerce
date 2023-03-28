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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->string("MaLoaiThanhToan");
            $table->string("TenLoaiThanhToan");
            // $table->timestamps("NgayCapNhat");
            $table->string("NguoiTao");
            $table->integer("GhiChu");
            $table->timestamps();
            $table->softdelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanh_toans');
    }
};