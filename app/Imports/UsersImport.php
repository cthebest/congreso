<?php

namespace App\Imports;

use App\Models\Presentation;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Validators\ValidationException;

class UsersImport implements ToModel, WithGroupedHeadingRow, SkipsOnFailure, WithValidation
{
    use Importable, SkipsFailures;

    private $role = 'evaluator';

    private $users = [];

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $presentations_name = $row['t'];

        // Buscamos todas las ponencias
        $presentations = Presentation::select('id')->whereIn('title', $presentations_name)->get();
        $user = new User([
            'name' => $row['name'] ?? $row['nombres_y_apellidos'],
            'email' => $row['email'] ?? $row['correo_electronico'],
            'password' => bcrypt($row['email'] ?? $row['correo_electronico']),
        ]);

        $this->users[] = [$user, 'presentations' => $presentations];
        return $user;
    }

    public function rules(): array
    {
        return [
            'nombres_y_apellidos' => 'required',
            'email' => Rule::unique('users'),
            'correo_electronico' => Rule::unique('users', 'email'),
        ];
    }

    public function getUsers()
    {
        return $this->users;
    }
}
