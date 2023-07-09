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
            $table->string('TieuDe')->nullable();
            $table->string('NoiDung')->nullable();
            $table->string('LoaiThongBao')->nullable();
            $table->string('DuongDan')->nullable();
            $table->string('TrangThai')->nullable();
            $table->dateTime('ThoiGianXem')->nullable();
            $table->string('NguoiNhan')->nullable();
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
