<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['exam_id', 'title', 'score'];

    public function exams()
    {
        return $this->hasOne(Exam::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
