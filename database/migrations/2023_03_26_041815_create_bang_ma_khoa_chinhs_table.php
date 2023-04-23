<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bang_ma_khoa_chinhs', function (Blueprint $table) {
            $table->id();
            $table->string("MaKhoaChinh")->unique();
            $table->integer("GiaTriHienTai")->nullable();
            $table->string("TenGiaTri")->nullable();
            $table->integer("TrangThai")->nullable();
            $table->timestamps();
        });

        // Tạo store procedure để gen mã theo bảng
        DB::statement('CREATE PROCEDURE sp_KhoiTaoKyHieu(IN p_MaKhoaChinh VARCHAR(50), OUT p_MaKhoaChinh_d VARCHAR(55))
        BEGIN
            DECLARE v_gia_tri_hien_tai INT;
            DECLARE v_ky_hieu_bang VARCHAR(20);

            -- Lấy data số mã hiện tại và ký hiệu của mã
            SELECT MaKhoaChinh, GiaTriHienTai INTO v_ky_hieu_bang, v_gia_tri_hien_tai
            FROM BangKhoaChinh WHERE MaKhoaChinh = p_MaKhoaChinh FOR UPDATE;

            -- Concat lại chuỗi dùng LPAD để đảm bảo mã sinh ra có độ dài 10 ký tự VD: SP000000001, SP000000002
            SET p_MaKhoaChinh_d = CONCAT(v_ky_hieu_bang, LPAD(v_gia_tri_hien_tai, 9, "0"));

            -- UPDATE lại giá trị tăng lên 1 cho lần tiếp theo lấy mã
            UPDATE BangKhoaChinh SET GiaTriHienTai = GiaTriHienTai + 1 WHERE MaKhoaChinh = p_MaKhoaChinh;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bang_ma_khoa_chinhs');
    }
};
