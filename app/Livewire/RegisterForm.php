<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Mail\SendTicket;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterForm extends Component
{
    public $isSuccess = false;
    public $isJoin = 0;
    public $firstName = '', $lastName = '', $email = '', $phone = '', $company = '', $jobTitle = '';

    public function submit()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:participants,email',
            'phone' => 'required|unique:participants,phone',
            'company' => 'required',
            'jobTitle' => 'required'
        ]);

        $participant = Participant::create([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'jobTitle' => $this->jobTitle,
            'token' => Str::random(15)
        ]);

        $participantTicket = new Ticket();
        $participantTicket->code = Str::random(15);
        $participantTicket->participant_id = $participant->id;
        $participantTicket->isPlenary = 0;
        $participantTicket->save();

        // Mail::to($participant->email)->send(new SendTicket($participant->firstName, $this->isJoin, $participantTicket->code));

        $this->reset();
        $this->isSuccess = true;
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
