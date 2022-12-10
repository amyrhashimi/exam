<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'lesson_id', 'date', 'date_end', 'time', 'time_end', 'period', 'random'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
