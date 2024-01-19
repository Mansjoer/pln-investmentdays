<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Illuminate\Support\Str;

class RegisterForm extends Component
{
    public $isSuccess = false;
    public $firstName = '', $lastName = '', $email = '', $phone = '', $company = '', $jobTitle = '';

    public function submit()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
            'jobTitle' => 'required'
        ]);

        // Participant::create([
        //     'firstName' => $this->firstName,
        //     'lastName' => $this->lastName,
        //     'email' => $this->email,
        //     'phone' => $this->phone,
        //     'company' => $this->company,
        //     'jobTitle' => $this->jobTitle,
        //     'token' => Str::random(15)
        // ]);

        $this->reset();
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
