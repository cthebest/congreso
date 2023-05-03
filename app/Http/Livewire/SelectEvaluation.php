<?php

namespace App\Http\Livewire;

use App\Models\EvaluationFormat;
use App\Models\Presentation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class SelectEvaluation extends Component
{
    use AuthorizesRequests;

    public $view_name = '';
    public $presentation = '';
    public $viewID;

    public function mount($id)
    {
        $this->presentation = Presentation::findOrFail($id);

        $this->authorize('view', $this->presentation);
    }

    public function render()
    {

        $formats = EvaluationFormat::pluck('name', 'id');
        return view('livewire.select-evaluation', compact('formats'));
    }

    public function updatedViewID($id)
    {
        $format = EvaluationFormat::findOrFail($id);
        $this->view_name = $format->view_name;
    }
}
