<?php

namespace App\Traits;

use App\Models\Thematic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

trait FormatTrait
{
    public $presentation_id;
    public $thematics;
    public $evaluation_format_id;

    public $evaluationPoints;
    public $thematic;
    public $general_evaluation;

    public $description;

    public function mount($presentation_id): void
    {
        $this->presentation_id = $presentation_id;
        $this->thematics = Thematic::all();
        $this->getEvaluationPoints();
    }

    public function rules()
    {
        return [
            'description' => 'required|max:255',
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
}
