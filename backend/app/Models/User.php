<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relación con los roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Método para verificar si tiene un rol específico
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    // Relación con las materias que enseña el profesor
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject_course')
                    ->wherePivot('user_id', $this->id);
    }

    // Relación con los cursos en los que está el alumno
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course')->wherePivot('user_id', $this->id);
    }

    // Verifica si es profesor
    public function isProfessor()
    {
        return $this->hasRole('profesor');
    }

    // Verifica si es alumno
    public function isStudent()
    {
        return $this->hasRole('alumno');
    }
}
