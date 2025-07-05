<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterUtuhProduk extends Model
{
    use HasFactory;
    protected $table = 'utuh_produk';
    protected $fillable = [
        'name',
        'ukuran',
        'quantity'
    ];
}
