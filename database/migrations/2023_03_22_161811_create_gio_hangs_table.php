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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->string("MaSanPham");
            $table->string("TenSanPham");
            $table->string("KichCo");
            $table->string("ThuongHieu");
            $table->string("SoLuong");
            $table->string("GiaTien");
            $table->string("TongTien");
            $table->string("HinhAnh");
            $table->string("LoaiKichCo");
            $table->string("GhiChu");
            $table->timestamps("NgayTao");
            $table->timestamps("NgayCapNhat");
            $table->string("NguoiTao");
            $table->integer("TrangThai");
            $table->softDeletes();
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
        Schema::dropIfExists('gio_hangs');
    }
};
