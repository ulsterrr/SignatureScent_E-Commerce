<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaoDien extends Model
{
    protected $fillable=['id','MaGiaoDien','MauSac','DuongDanGD','ThuMuc','TenGiaoDien'];
}
