<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name'];

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_subject_course')->whereHas('roles', function ($query) {
            $query->where('name', 'profesor');
        });
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_subject_course');
    }
}

