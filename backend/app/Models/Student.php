<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'current_course',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id'); // Un estudiante pertenece a un curso
    }
}
