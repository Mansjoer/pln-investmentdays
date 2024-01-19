<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('registration.index');
    }

    public function verify($token)
    {
        $participant = Participant::where('token', $token)->firstOrFail();
        if ($participant->isVerified == 0) {
            $participant->update([
                'token' => null,
                'isVerified' => 1
            ]);
            $ticket = Ticket::create([
                'code' => Str::random(15),
                'participant_id' => $participant->id,
            ]);
            return view('registration.verify', compact('ticket'));
        } else {
            return redirect()->route('app-register');
        }
    }
}
