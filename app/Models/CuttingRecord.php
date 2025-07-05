<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CuttingRecord extends Model
{
    use HasFactory;
    protected $table = 'cutting_record';
    protected $fillable = [
        'copper_cutting_id',
        'ukuran',
        'quantity',
        'total',
        'stok_utuh_id',
        'stok_utuh',
        'stok_potong_id',
        'stok_potong'
    ];
}
