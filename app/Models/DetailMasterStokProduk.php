<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailMasterStokProduk extends Model
{
    use HasFactory;
    protected $table = 'detail_stok_produk';
    protected $fillable = [
        'stok_id',
        'panjang',
        'description',
    ];

     public function stok()
    {
        return $this->belongsTo(MasterStokProduk::class, 'stok_id', 'id');
    }
}
