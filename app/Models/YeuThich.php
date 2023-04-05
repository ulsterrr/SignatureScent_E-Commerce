<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThich extends Model
{
    use HasFactory;
    protected $table = 'yeu_thichs';
    protected $fillable=['TenSanPham','MaSanPham','NguoiThich','TrangThai'];
}
