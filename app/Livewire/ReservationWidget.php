<?php

namespace App\Livewire;

use App\Models\Participant;
use App\Models\Reservation;
use Livewire\Component;

class ReservationWidget extends Component
{
    public function render()
    {
        $participants = Participant::where('reservation_id', '!=', 0)->get();
        $reservations = Reservation::all();
        $isBilaterals = Reservation::where('isApproved', 1)->get();
        $isNotBilaterals = Reservation::where('isApproved', 0)->get();
        return view('livewire.reservation-widget', compact('participants', 'reservations', 'isBilaterals', 'isNotBilaterals'));
    }
}
