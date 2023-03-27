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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->string("MaSanPham");
            $table->string("TenSanPham");
            $table->string("ThuongHieu");
            $table->integer("TrangThai");
            $table->string("GiaTien");
            $table->string("MoTa");
            $table->string("HinhAnh");
            $table->string("LoaiKichCo");
            $table->string("LoaiSanPham");
            $table->string("GhiChu");
            $table->string("NguoiTao");
            $table->timestamps("NgayTao");
            $table->timestamps("NgayCapNhat");
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
        Schema::dropIfExists('san_phams');
    }
};
