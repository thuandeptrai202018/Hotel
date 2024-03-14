<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinKhachSan extends Model
{
    use HasFactory;

    protected $table = 'thong_tin_khach_sans';

    protected $fillable = [
        'ten_khach_san',
        'dia_chi',
        'mo_ta',
        'thanh_pho',
        'quoc_gia',
        'so_dien_thoai',
        'email',
        'nguoi_dai_dien',
        'is_open',
        'website',
    ];
}
