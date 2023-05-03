<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function evaluation_points()
    {
        return $this->belongsToMany(EvaluationPoint::class, 'question_map');
    }

    public function evaluation_formats()
    {
        return $this->belongsToMany(EvaluationFormat::class, 'question_map');
    }

    public function evaluation_question_points()
    {
        return $this->belongsToMany(EvaluationPoint::class, 'evaluation_question');
    }

    public function evaluation_question_formats()
    {
        return $this->belongsToMany(EvaluationFormat::class, 'evaluation_question');
    }

    public function evaluation_users()
    {
        return $this->belongsToMany(User::class, 'evaluation_question');
    }
}
