<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminUserUpdateForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminUserProfile extends Component
{
    public AdminUserUpdateForm $form;
    public $change_pwd = false;
    public $old_password;
    public $new_password;
    public $repeat_password;
    public $error = null;
    public $message = null;

    public function mount()
    {
        foreach(User::query()->find(['id' => Auth::guard()->user()->id]) as $user) {
            $user;
        }
        $this->form->setUserData($user);
        return $user;
    }

    #[Title("User profile")]
    #[Layout('components.layouts.timoros')]
    public function render()
    {
        return view('/timoros/auth/profile', [
            'permissions' => json_decode(Auth::guard()->user()->permissions, true),
        ]);
    }

    public function updateUser()
    {
        if ($this->change_pwd):
            if (empty($this->old_password) || empty($this->new_password) || empty($this->repeat_password)):
                $this->error = 'Please fill all the fields.';
            else:
                if (password_verify($this->old_password, $this->form->password)):
                    $this->new_password === $this->repeat_password
                        ? $this->form->password = password_hash($this->new_password, PASSWORD_DEFAULT)
                        : $this->error = 'New password doesn\'t match the repeat password field!';
                else:
                    $this->error = 'The old password is wrong!';
                endif;
            endif;
        else:
            $this->form->updateUser(Auth::user()->id)
                ? $this->message = 'User edited successfully!'
                : $this->message = 'There was an error editing the user data';
        endif;
    }
}
