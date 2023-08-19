<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='sanpham';
    protected $primaryKey='id_sp';
    protected $dated= 'ngay';
    protected $fillable= [
        'id_loai',
        'ten_sp',
        'gia',
        'gia_km',
        'hinh',
        'ngay',
        'soluotxem',
        'hot',
        'anhien',
        'tinhchat',
        'mota'
    ];
}
