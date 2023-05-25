<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;
    protected $table = 'thong_baos';
    protected $fillable=['TieuDe','NoiDung','LoaiThongBao','DuongDan','TrangThai','ThoiGianXem','NguoiNhan'];
}
