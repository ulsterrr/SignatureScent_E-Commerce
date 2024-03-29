<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email', 'email_verification_token',
        'password','LoaiTaiKhoan','HoTen','GioiTinh','DiaChi','SDT','QuanHuyen','TinhThanh','ChiNhanh','NgaySinh','TrangThai','NguoiTao','MaGiaoDien',
        'AnhDaiDien', 'KMSD'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loaiTaiKhoan()
    {
        return $this->hasOne(LoaiTaiKhoan::class, 'MaLoai','LoaiTaiKhoan');
    }

    public function chiNhanh()
    {
        return $this->hasOne(ChiNhanh::class, 'MaChiNhanh','ChiNhanh');
    }
}
