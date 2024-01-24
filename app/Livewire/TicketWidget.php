<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Models\Participant;

class TicketWidget extends Component
{
    public function render()
    {
        $tickets = Ticket::get();
        $participants = Participant::all();
        return view('livewire.ticket-widget', compact('tickets', 'participants'));
    }
}
