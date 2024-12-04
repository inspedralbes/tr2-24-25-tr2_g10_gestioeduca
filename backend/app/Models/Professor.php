<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'department', 
        'hire_date'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at'
    ];
}