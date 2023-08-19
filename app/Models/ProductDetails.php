<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
    protected $table='sanphamchitiet';
    protected $primaryKey='id_ct';
    protected $fillable= [
        'id_sp',
        'RAM',
        'CPU',
        'Dia',
        'Mausac',
        'cannang',
        'inventory',
        'sold'
    ];
}
