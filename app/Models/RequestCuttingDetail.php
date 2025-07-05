<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestCuttingDetail extends Model
{
    use HasFactory;
    protected $table = 'copper_cutting_detail';
    protected $fillable = [
        'copper_cutting_id',
        'panel_name_utama',
        'panel_name',
        'type',
        'dimension',
        'length',
        'quantity',
        'total_length',
    ];
}
