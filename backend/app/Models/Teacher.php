<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'department',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects_courses', 'teacher_id', 'subject_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_subjects_courses', 'teacher_id', 'course_id');
    }
}
