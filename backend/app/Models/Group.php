<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'description',
        'number_of_students',
        'id_course',
    ];

    // Relación con Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'id_course');
    }

    // Relación con User (tabla intermedia)
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_user', 'id_group', 'user_id');
    }
}
