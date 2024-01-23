<?php

namespace App\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public $username, $password, $remember;

    public function submit()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        session()->flash('invalidCredentials', 'mantap');

        // dd('ea');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
