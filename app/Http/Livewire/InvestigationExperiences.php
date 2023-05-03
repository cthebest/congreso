<?php

namespace App\Http\Livewire;

use App\Models\EvaluationPoint;
use App\Traits\FormatTrait;
use Livewire\Component;

class InvestigationExperiences extends Component
{

    use FormatTrait;

    private function getEvaluationPoints()
    {
        $this->evaluation_format_id = 2;
        $this->evaluationPoints = EvaluationPoint::with(['questions' => function ($query) {
            $query->where('evaluation_format_id', 2);
        }])->get()->toArray();
    }

    public function render()
    {
        return view('livewire.investigation-experiences');
    }
}
