<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Relación mapa
    public function evaluation_formats()
    {
        return $this->belongsToMany(EvaluationFormat::class, 'question_map');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_map');
    }

    // Notas preguntas
    public function evaluation_question_formats()
    {
        return $this->belongsToMany(EvaluationFormat::class, 'evaluation_question');
    }

    public function evaluation_questions()
    {
        return $this->belongsToMany(Question::class, 'evaluation_question');
    }

    public function evaluation_users()
    {
        return $this->belongsToMany(User::class, 'evaluation_question');
    }
}
