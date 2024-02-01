<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\Attributes\Url;

class TicketTable extends Component
{
    // #[Url]
    public $search = '';

    public $pagination = 5;

    protected $listeners = ['refreshTicketTable' => '$refresh'];

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $tickets = Ticket::whereHas('participant', function ($q) {
                $q->where('firstName', 'LIKE', $search);
            })
                ->orWhere('code', 'LIKE', $search)
                ->get();
        } else {
            $tickets = Ticket::orderByDesc('created_at')->paginate($this->pagination);
        }
        return view('livewire.ticket-table', compact('tickets'));
    }
}
