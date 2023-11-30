<?php

use App\Livewire\AdminUpload;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(AdminUpload::class)
        ->assertStatus(200);
});
