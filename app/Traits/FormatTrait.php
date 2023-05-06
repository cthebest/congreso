<?php

namespace App\Traits;

use App\Models\Thematic;
use App\Rules\WordCountRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
define('MAX_WORDS', 150);
trait FormatTrait
{
    public $presentation_id;
    public $thematics;
    public $evaluation_format_id;

    public $evaluationPoints;
    public $thematic;
    public $general_evaluation;

    public $description;

    public int $words_left = MAX_WORDS;
    public function mount($presentation_id): void
    {
        $this->presentation_id = $presentation_id;
        $this->thematics = Thematic::all();
        $this->getEvaluationPoints();
    }

    public function rules()
    {
        return [
            'description' => ['required', new WordCountRule(150)],
            'general_evaluation' => 'required|in:aceptado,aceptado con modificaciones,no es aceptado',
            'thematic' => 'required|exists:thematics,id'
        ];
    }


    /**
     * @throws ValidationException
     */
    public function store()
    {
        $this->validate();

        $evaluatePresentationWithQuestions = [];
        $user = Auth::user();

        Validator::make($this->evaluationPoints, [
            '*.questions.*.note' => [
                'required',
                Rule::in(['si', 'partial', 'no']),
            ],

        ])->validate();
        foreach ($this->evaluationPoints as $evaluationPoint) {
            foreach ($evaluationPoint['questions'] as $question) {
                $evaluatePresentationWithQuestions[$question['id']] = ['evaluation_format_id' => $this->evaluation_format_id, 'evaluation_point_id' => $evaluationPoint['id'], 'presentation_id' => $this->presentation_id, 'note' => $question['note']];
            }
        }

        $user->evaluation_questions()->attach($evaluatePresentationWithQuestions);

        $user->review_presentations()->attach($this->presentation_id, ['evaluation_format_id' => $this->evaluation_format_id, 'thematic_id' => $this->thematic, 'general_evaluation' => $this->general_evaluation, 'description' => $this->description]);

        session()->flash('message', 'Evaluación se guardó con éxito');

        return redirect()->route('presentations');
    }

    public function updatingDescription($value)
    {
        $this->words_left = MAX_WORDS - str_word_count($value);
    }
}
