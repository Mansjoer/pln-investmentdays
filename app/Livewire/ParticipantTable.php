<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class ParticipantTable extends Component
{
    use WithPagination;

    // #[Url]
    public $search = '';

    public $precense, $category;

    public $pagination = 5;

    protected $listeners = ['refreshParticipantTable' => '$refresh'];

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function delete($id)
    {
        $participant = Participant::find($id);
        $participant->delete();
        if ($participant->reservation) {
            $participant->reservation->delete();
            foreach ($participant->reservation->topic as $topic) {
                $topic->delete();
            }
            $participant->reservation->hospitality->delete();
        }
        if ($participant->ticket) {
            $participant->ticket->delete();
            $participant->ticket->zone->delete();
        }
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $participants = Participant::where('firstName', 'LIKE', $search)
                ->orWhere('lastName', 'LIKE', $search)
                ->orWhere('company', 'LIKE', $search)
                ->orderByDesc('created_at')
                ->get();
        } else {
            $participants = Participant::paginate($this->pagination);
        }

        return view('livewire.participant-table', compact('participants'));
    }
}
