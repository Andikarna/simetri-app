<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_management extends Model
{
    use HasFactory;
    protected $table = 'user_management';
    protected $fillable = [
        'role_id',
        'menu_id',
    ]; 
}
