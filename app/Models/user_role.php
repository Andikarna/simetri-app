<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user_role extends Model
{
     use HasFactory;
    protected $table = 'user_role';
    protected $fillable = [
        'name',
    ]; 
}
