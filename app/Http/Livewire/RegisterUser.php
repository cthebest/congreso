<?php

namespace App\Http\Livewire;

use App\Models\Presentation;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Psy\Util\Str;
use Spatie\Permission\Models\Role;

class RegisterUser extends Component
{
    use WithPagination;

    public User $user;
    public int $role_id = 2;
    public Collection $assigned_presentations;

    public string $search_presentations = '';

    public function rules()
    {
        return [
            'user.name' => [
                'required'
            ],
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id)
            ],
            'role_id' => 'required|exists:roles,id'
        ];
    }

    public function mount(User $user)
    {
        $this->assigned_presentations = new Collection();
        $this->user = $user ?? new User();
        if ($user && $user->roles()->count() > 0) {
            $this->role_id = $user->roles()->first()->id;
            $this->assigned_presentations = $user->presentations()->with('thematics')->get();
        }
    }

    public function render()
    {
        $presentations = Presentation::title($this->search_presentations)->whereNotIn('id', $this->assigned_presentations->pluck('id'))->paginate(5);
        $roles = Role::pluck('name', 'id');
        return view('livewire.register-user', compact('presentations', 'roles'));
    }

    public function assign(Presentation $presentation)
    {
        $this->assigned_presentations->add($presentation);
    }


    public function unlock($key)
    {
        $this->assigned_presentations = $this->assigned_presentations->forget($key)->values();
    }

    public function store()
    {
        $this->validate();
        $this->user->syncRoles($this->role_id);
        if (!$this->user->id)
            $this->user->password = bcrypt($this->user->email);
        $this->user->save();

        // Sincronizamos las ponencias asignadas
        $this->user->presentations()->sync($this->assigned_presentations->pluck('id'));

        session()->flash('message', 'La operación se ha completado exitosamente');

        return redirect()->route('users.edit', $this->user->id);
    }
}
