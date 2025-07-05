<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuyCopper extends Model
{
    use HasFactory;
    protected $table = 'buy_copper';
    protected $fillable = [
        'date',
        'no_sppt',
        'no',
        'item_number',
        'item_description',
        'merk',
        'required',
        'uo',
        'expired_date',
        'description',
        'status'
    ];
}
