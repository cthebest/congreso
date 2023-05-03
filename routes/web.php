<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\PresentationLivewire;
use App\Http\Livewire\SelectEvaluation;
use App\Http\Livewire\UploadPresentation;
use App\Models\Presentation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/presentations', PresentationLivewire::class)->middleware('role:admin|evaluator')->name('presentations');
    Route::get('/presentations/upload', UploadPresentation::class)->middleware('role:admin')->name('upload');

    Route::get('/presentations/{id}', function ($id) {
        $presentation = Presentation::find($id);
        $type = explode('.', $presentation->file_path);

        return response()->download(storage_path('app/' . $presentation->file_path), $presentation->title . '.' . $type[1]);
    })->middleware('auth')->name('presentations.show');


    Route::get('evaluations/{id}/presentation', SelectEvaluation::class)
        ->middleware('role:evaluator')->name('evaluations.presentation');
});

require __DIR__ . '/auth.php';
