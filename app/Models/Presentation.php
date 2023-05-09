<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Presentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'file_path'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // Evaluacion general de la ponencia
    public function thematics(): BelongsToMany
    {
        return $this->belongsToMany(Thematic::class, 'paper_reviews')->withTimestamps();
    }

    public function review_question_formats(): BelongsToMany
    {
        return $this->belongsToMany(EvaluationFormat::class, 'paper_reviews')->withTimestamps();
    }

    public function review_question_users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'paper_reviews')->withTimestamps();
    }

    public function scopeTitle($query, $search)
    {
        if (trim($search)) {
            return $query->where('title', 'LIKE', "%$search%");
        }
        return $query;
    }
}
