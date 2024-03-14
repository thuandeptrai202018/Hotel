<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaPhong extends Model
{
    use HasFactory;

    protected $table = 'gia_phongs';

    protected $fillable = [
        'ma_phong',
        'ma_loai_phong',
        'gia_theo_gio',
        'gia_theo_ngay',
    ];
}
