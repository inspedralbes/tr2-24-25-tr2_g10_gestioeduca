<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'year']; // Asegúrate de que 'year' esté en fillable

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject_course');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teacher_subject_course')->whereHas('roles', function ($query) {
            $query->where('name', 'profesor');
        });
    }
}
