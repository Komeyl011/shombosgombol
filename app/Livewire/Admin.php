<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Admin extends Component
{
    public $userPermissions;

    function mount()
    {
        $this->userPermissions = json_decode(Auth::user()->permissions, true);
        if (count($this->userPermissions) == 0):
            return $this->redirect('/home');
        endif;
    }

    #[Layout('components.layouts.timoros')]
    #[Title('Home | Admin')]
    public function render()
    {
        return view('timoros.home');
    }
}
