<?php

namespace App\Http\Livewire;

use App\Models\Presentation;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPresentation extends Component
{
    use WithFileUploads;

    public $files;


    public function rules()
    {
        return [
            'files.*' => [
                'required',
                'mimes:pdf,docx,doc,dot'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.upload-presentation');
    }


    public function upload()
    {
        $this->validate();

    }
}
