<?php

namespace App\Http\Livewire;

use App\Models\EvaluationPoint;
use App\Models\Question;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class InvestigationInProcess extends Component
{
    public $evaluationPoints;
    public $presentation_id;

    public function mount($presentation_id)
    {
        $this->presentation_id = $presentation_id;
        $this->evaluationPoints = EvaluationPoint::with(['questions' => function ($query) {
            $query->where('evaluation_format_id', 1);
        }])->get()->toArray();
    }

    public function render()
    {
        return view('livewire.investigation-in-process');
    }
    /**
     * public function changeEvent($value, $question_key, $evaluation_key)
     * {
     * $this->evaluationPoints[$evaluation_key]['questions'][$question_key]['note'] = $value;
     * }
     */

    /**
     * @throws ValidationException
     */
    public function store()
    {
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


                $evaluatePresentationWithQuestions[$question['id']] = ['evaluation_format_id' => 1, 'evaluation_point_id' => $evaluationPoint['id'], 'presentation_id' => $this->presentation_id, 'note' => $question['note']];
            }
        }


        $user->evaluation_questions()->sync($evaluatePresentationWithQuestions);
    }
}
