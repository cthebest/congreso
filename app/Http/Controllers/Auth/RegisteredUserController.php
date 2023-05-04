<?php

namespace App\Http\Controllers\Auth;

use App\Exports\LogFailureExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
        ]);

        event(new Registered($user));

        return redirect()->back();
    }

    public function import()
    {

        $import = new UsersImport();
        $import->import(request()->file('file'));
        $failures = $import->failures();
        Excel::store(new LogFailureExport($failures), 'logs/failures.xlsx');
        foreach ($import->getUsers() as $user) {
            $user[0]->assignRole(2);
            $user[0]->presentations()->sync($user['presentations']);
        }
        return redirect()->back()->with('failures', $failures);
    }


    public function download_log()
    {
        return response()->download(storage_path('app/logs/failures.xlsx'), "failures.xlsx", [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename="failures.xlsx"'
        ]);
    }
}
