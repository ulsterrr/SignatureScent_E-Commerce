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
            $table->string("MaSanPham")->key();
            $table->string("TenSanPham")->nullable();
            $table->string("ThuongHieu")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->string("GiaTien")->nullable();
            $table->text("MoTa")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("LoaiKichCo");
            $table->string("LoaiSanPham");
            $table->text("GhiChu")->nullable();
            $table->string("NguoiTao")->nullable();
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
        Schema::dropIfExists('san_phams');
    }
};
