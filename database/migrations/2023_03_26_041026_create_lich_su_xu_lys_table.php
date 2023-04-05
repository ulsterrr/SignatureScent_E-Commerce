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
        Schema::create('lich_su_xu_lys', function (Blueprint $table) {
            $table->id();
            $table->text("NoiDung")->nullable();
            $table->string("TaiKhoan");
            $table->string("ChucNang")->nullable();
            $table->date("ThoiGian")->nullable();
            $table->date("ThuMuc")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lich_su_xu_lys');
    }
};
