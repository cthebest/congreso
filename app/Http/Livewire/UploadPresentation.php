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
        foreach ($this->files as $file) {
            $title = $file->getClientOriginalName();
            $presentation = new Presentation();
            $presentation->title = $title;
            $presentation->alias = Str::slug($title);
            $presentation->file_path = $file->store('files');
            $presentation->save();
        }
        session()->flash('message', 'Presentaciones subidas con éxito');

        return redirect()->route('presentations');
    }
}
