<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model

{
    protected $fillable = [
        'subject_name',
        'description'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects_courses', 'subject_id', 'teacher_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_subjects_courses', 'subject_id', 'course_id');
    }
}
