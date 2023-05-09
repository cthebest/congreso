<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function presentations(): BelongsToMany
    {
        return $this->belongsToMany(Presentation::class);
    }

    public function evaluation_question_points()
    {
        return $this->belongsToMany(EvaluationPoint::class, 'evaluation_question');
    }

    public function evaluation_question_formats()
    {
        return $this->belongsToMany(EvaluationFormat::class, 'evaluation_question');
    }

    public function evaluation_questions()
    {
        return $this->belongsToMany(Question::class, 'evaluation_question');
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

    public function review_presentations(): BelongsToMany
    {
        return $this->belongsToMany(Presentation::class, 'paper_reviews')->withTimestamps();
    }


    public function scopeName($query, $term)
    {
        if (trim($term)) {
            return $query->where('name', 'LIKE', "%$term%");
        }

        return $query;
    }
}
