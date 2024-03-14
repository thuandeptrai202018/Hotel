<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'ho_lot',
        'ten',
        'email',
        'password',
        'ho_va_ten',
        'ngay_sinh',
        'so_dien_thoai',
        'dia_chi',
        'gioi_tinh',
        'id_quyen',
        'hash_word',
        'is_master',
    ];
}
