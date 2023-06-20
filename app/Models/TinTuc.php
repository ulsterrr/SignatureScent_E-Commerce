<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tin_tucs';
    protected $fillable=['TieuDe','NoiDung','PhuDe','Anh1','Anh2','Anh3'];
}
