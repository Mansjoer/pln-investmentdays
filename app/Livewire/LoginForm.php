<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $username, $password, $remember;

    public function submit()
    {
        $this->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ], [
            'username.required' => "Username can't be empty.",
            'username.exists' => "Your username or password is incorrect.",
            'password.required' => "Password can't be empty."
        ]);
        if (Auth::attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            return redirect()->route('admin-dashboard');
        } else {
            session()->flash('invalidCredentials', 'Your username or password is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
