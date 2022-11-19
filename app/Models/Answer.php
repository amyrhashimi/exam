<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'exam_id', 'question_id', 'result_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
