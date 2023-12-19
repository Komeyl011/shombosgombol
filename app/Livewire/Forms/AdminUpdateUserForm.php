<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminUpdateUserForm extends Form
{
    protected $user;

    public $username;
    public $email;
    public $permissions;
    public $created_at;

    public function getUser($user)
    {
        $this->user = $user;

        $this->username = $user['username'];
        $this->email = $user['email'];
        $this->permissions = json_decode($user['permissions'], true);
        $this->created_at = explode('T', $user['created_at']);
    }
}
