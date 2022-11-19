<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $fillable = ['answer', 'correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}