<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStokProduk extends Model
{
    use HasFactory;
    protected $table = 'stok_produk';
    protected $fillable = [
        'ukuran',
        'total_panjang',
    ];

    public function detailStokProduk()
    {
        return $this->hasMany(DetailMasterStokProduk::class, 'stok_id', 'id');
    }
}
