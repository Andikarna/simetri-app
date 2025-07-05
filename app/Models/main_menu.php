<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class main_menu extends Model
{
    use HasFactory;
    protected $table = 'main_menu';
    protected $fillable = [
        'name',
    ];
}
