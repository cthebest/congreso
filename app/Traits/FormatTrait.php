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
     * Store a newly created evaluation for a presentation in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        // Validate the request data
        $this->validate();
        // Initialize an empty array to store the evaluation points
        $evaluatePresentationWithQuestions = [];
        // Get the authenticated user
        $user = Auth::user();
        // Validate the questions and notes
        Validator::make($this->evaluationPoints, [
            '*.questions.*.note' => [
                'required',
                Rule::in(['si', 'partial', 'no']),
            ],

        ])->validate();
        // Get the reviews for the current user and presentation
        $reviews = $user->review_presentations()->where('user_id', $user->id)->where('presentation_id', $this->presentation_id)->get();
        // Check if there are any reviews for this presentation already
        if ($reviews->count() > 0) {
            // Display a flash message and redirect back to the presentations page
            session()->flash('message', 'Ya existe una evaluación para esta presentación');
            return redirect()->route('presentations');
        }
        // Loop through the evaluation points and questions to populate the array
        foreach ($this->evaluationPoints as $evaluationPoint) {
            foreach ($evaluationPoint['questions'] as $question) {
                $evaluatePresentationWithQuestions[$question['id']] = ['evaluation_format_id' => $this->evaluation_format_id, 'evaluation_point_id' => $evaluationPoint['id'], 'presentation_id' => $this->presentation_id, 'note' => $question['note']];
            }
        }
        // Attach the evaluation questions to the authenticated user
        $user->evaluation_questions()->attach($evaluatePresentationWithQuestions);
        // Attach the review presentation to the authenticated user
        $user->review_presentations()->attach($this->presentation_id, ['evaluation_format_id' => $this->evaluation_format_id, 'thematic_id' => $this->thematic, 'general_evaluation' => $this->general_evaluation, 'description' => $this->description]);
        // Display a flash message and redirect back to the presentations page
        session()->flash('message', 'Evaluación se guardó con éxito');
        return redirect()->route('presentations');
    }

    public function updatingDescription($value)
    {
        $this->words_left = MAX_WORDS - str_word_count($value);
    }
}
