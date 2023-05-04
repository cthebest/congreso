<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Http\Requests\StorePresentationRequest;
use App\Http\Requests\UpdatePresentationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::paginate(12);
        return view('presentations.index', compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presentation.upload-presentation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $files = $request->file('files');
        $presentations = [];
        foreach ($files as $file) {
            $title = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $presentations[] = ['title' => $title, 'alias' => Str::slug($title), 'file_path' => $file->store('files')];
        }
        Presentation::insert($presentations);
        session()->flash('message', 'Presentaciones subidas con éxito');

        return redirect()->route('presentations');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presentation $presentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presentation $presentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentationRequest $request, Presentation $presentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presentation $presentation)
    {
        //
    }
}
