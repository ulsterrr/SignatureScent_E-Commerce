<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoDien extends Model
{
    use HasFactory;
    protected $table = 'gia_diens';
    protected $fillable=['MaGiaoDien','MauSac','DuongDanGD','ThuMuc','TenGiaoDien'];
}
