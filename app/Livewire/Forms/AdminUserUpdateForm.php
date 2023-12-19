<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminUserUpdateForm extends Form
{
    protected $user;
    #[Rule('required')]
    public $username;
    #[Rule('required')]
    public $email;
    #[Rule('required')]
    public $password;

    public function setUserData($user)
    {
        $this->user = $user;

        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public function updateUser($id)
    {
        return User::query()->where('id', '=', $id)->update($this->toArray());
    }
}
