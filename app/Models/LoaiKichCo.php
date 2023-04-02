<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKichCo extends Model
{
    protected $fillable=['MaKichCo','TenKichCo','NguoiTao','GhiChu'];
}
