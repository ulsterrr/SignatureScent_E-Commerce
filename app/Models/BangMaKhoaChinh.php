<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangMaKhoaChinh extends Model
{
    use HasFactory;
    protected $table = 'bang_ma_khoa_chinhs';
    protected $fillable=['MaKhoaChinh','GiaTriHienTai','TenGiaTri','TrangThai','TrangThai'];
}
