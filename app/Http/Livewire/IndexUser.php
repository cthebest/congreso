<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class IndexUser extends Component
{
    public string $term = '';
    public array $users_id = [];

    public function render()
    {
        $users = User::name($this->term)->with('roles')->where('id', '!=', auth()->user()->id)->paginate(12);

        return view('livewire.index-user', compact('users'));
    }

    public function destroy()
    {
        User::destroy($this->users_id);

        session()->flash('message', 'Usuario(s) eliminado(s) con éxito');
    }
}
