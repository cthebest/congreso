<?php

namespace App\Http\Livewire;

use App\Models\Presentation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PresentationLivewire extends Component
{
    public string $term = '';
    public array $presentations_id = [];

    public int $evaluate_presentation_id = 0;

    public function render()
    {
        $user = Auth::user();

        if ($user->hasRole('evaluator')) {
            $query = $user->presentations();

        } else {
            $query = Presentation::with('users');
        }

        $presentations = $query->title($this->term)->paginate(12);

        return view('livewire.presentation-livewire', compact('presentations'));
    }


    public function destroy()
    {

        $presentations = Presentation::whereIn('id', $this->presentations_id)->pluck('file_path');
        foreach ($presentations as $presentation) {
            if (file_exists(storage_path('app/' . $presentation))) {
                Storage::disk('local')->delete($presentation);
            }
        }

        Presentation::destroy($this->presentations_id);
        session()->flash('message', 'Presentaciones eliminadas con éxito');
    }
}
