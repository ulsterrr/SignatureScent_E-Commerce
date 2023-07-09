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
        Schema::create('loai_kich_cos', function (Blueprint $table) {
            $table->id();
            $table->string("MaKichCo")->unique();
            $table->string("TenKichCo")->nullable();
            $table->string("NguoiTao")->nullable();
            $table->text("GhiChu")->nullable();
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
        Schema::dropIfExists('loai_kich_cos');
    }
};
