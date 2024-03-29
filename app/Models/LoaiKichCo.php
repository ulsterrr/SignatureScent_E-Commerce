<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKichCo extends Model
{
    use HasFactory;
    protected $table = 'loai_kich_cos';
    protected $fillable=['MaKichCo','TenKichCo','NguoiTao','GhiChu'];
}
