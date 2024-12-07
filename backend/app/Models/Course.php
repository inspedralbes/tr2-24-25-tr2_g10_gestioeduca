<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'year'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects_courses', 'course_id', 'teacher_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects_courses', 'course_id', 'subject_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id', 'id');
    }
}
