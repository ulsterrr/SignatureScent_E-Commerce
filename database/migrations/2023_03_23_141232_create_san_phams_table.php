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
            $table->id();
            $table->string("MaSanPham")->unique();
            $table->string("TenSanPham")->nullable();
            $table->string("ThuongHieu")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->decimal("VAT", 18, 0)->nullable();
            $table->decimal("GiaVAT", 18, 0)->nullable();
            $table->decimal("GiaTien", 18, 0)->nullable();
            $table->text("MoTa")->nullable();
            $table->string("HinhAnh")->nullable();
            $table->string("LoaiKichCo")->nullable();
            $table->string("LoaiSanPham")->nullable();
            $table->text("GhiChu")->nullable();
            $table->string("NguoiTao")->nullable();
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
        Schema::dropIfExists('san_phams');
    }
};
