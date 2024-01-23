<?php

namespace App\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public function submit()
    {
        sleep(3);
        dd('ea');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
