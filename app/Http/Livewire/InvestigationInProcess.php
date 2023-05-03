<?php

namespace App\Http\Livewire;

use App\Models\EvaluationPoint;
use App\Models\Question;
use App\Models\Thematic;
use App\Traits\FormatTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class InvestigationInProcess extends Component
{
    use FormatTrait;

    private function getEvaluationPoints()
    {
        $this->evaluation_format_id = 1;
        $this->evaluationPoints = EvaluationPoint::with(['questions' => function ($query) {
            $query->where('evaluation_format_id', 1);
        }])->get()->toArray();
    }

    public function render()
    {
        return view('livewire.investigation-in-process');
    }
}
