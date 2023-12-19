<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminUpdateUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminUpdateUser extends Component
{
    public $key;

    public AdminUpdateUserForm $form;

    public function mount()
    {
        $user = User::query()->find(['id' => $this->key])->toArray();
        foreach ($user as $asArr) {
            $asArr;
        }
        $this->form->getUser($asArr);
        $userPermissions = json_decode(Auth::user()->permissions, true);
        if (!array_key_exists('platform.systems.roles', $userPermissions) || !array_key_exists('platform.systems.users', $userPermissions) || !array_key_exists('platform.systems.index', $userPermissions)):
            return $this->redirect('/timoros');
        endif;
    }

    #[Title('Edit User')]
    #[Layout('components.layouts.timoros')]
    public function render()
    {
        return view('timoros/users/edit');
    }
}
