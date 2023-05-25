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
        Schema::create('thong_baos', function (Blueprint $table) {
            $table->id();
            $table->string('TieuDe');
            $table->string('NoiDung');
            $table->string('LoaiThongBao');
            $table->string('DuongDan');
            $table->string('TrangThai');
            $table->dateTime('ThoiGianXem');
            $table->string('NguoiNhan');
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
        Schema::dropIfExists('thong_baos');
    }
};
