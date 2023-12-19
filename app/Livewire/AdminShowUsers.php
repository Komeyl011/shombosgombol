<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminShowUsers extends Component
{
    public function getUsers()
    {
        return User::query()->paginate(10);
    }

    public function mount()
    {
        $userPermissions = json_decode(Auth::user()->permissions, true);
        if (!array_key_exists('platform.systems.roles', $userPermissions) || !array_key_exists('platform.systems.users', $userPermissions) || !array_key_exists('platform.systems.index', $userPermissions)):
            return $this->redirect('/timoros');
        endif;
    }

    #[Title('Show Users')]
    #[Layout('components.layouts.timoros')]
    public function render()
    {
        return view('/timoros/users/show', [
            'users' => $this->getUsers(),
        ]);
    }

    public function deleteUser($id)
    {
        return User::query()->where('id', '=', $id)->delete();
    }
}
