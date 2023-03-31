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
            $table->string("TenSanPham")->nullable();
            $table->string("KichCo")->nullable();
            $table->string("ThuongHieu")->nullable();
            $table->string("SoLuong")->nullable();
            $table->string("GiaTien")->nullable();
            $table->string("TongTien")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("LoaiKichCo")->nullable();
            $table->text("GhiChu")->nullable();
            // $table->timestamps("NgayTao");
            // $table->timestamps("NgayCapNhat");
            $table->string("NguoiTao");
            $table->integer("TrangThai")->nullable();
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
