<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answer'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->belongsTo(Question::class);
    }
}
