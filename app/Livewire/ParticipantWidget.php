<?php

namespace App\Livewire;

use App\Models\Participant;
use Livewire\Component;

class ParticipantWidget extends Component
{
    public function render()
    {
        $participants = Participant::where('isMedia', 0)->get();
        $presents = Participant::where('isComing', 1)->get();
        $notPresents = Participant::where('isComing', 0)->get();
        $media = Participant::where('isMedia', 1)->get();
        return view('livewire.participant-widget', compact('participants', 'media', 'presents', 'notPresents'));
    }
}
