<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationFormat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function evaluation_points()
    {
        return $this->belongsToMany(EvaluationPoint::class, 'question_map');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_map');
    }
    // Evaluation notes

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function evaluation_question_points()
    {
        return $this->belongsToMany(EvaluationPoint::class, 'evaluation_question');
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
