<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestCutting extends Model
{
    use HasFactory;
    protected $table = 'copper_cutting_lists';
    protected $fillable = [
        'production_code',
        'project_code',
        'project_name',
        'production_date',
        'status',
    ];  
}
