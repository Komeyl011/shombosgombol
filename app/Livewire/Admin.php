<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Admin extends Component
{

    #[Layout('components.layouts.timoros')]
    #[Title('Home | Admin')]
    public function render()
    {
        return view('timoros.home');
    }
}
