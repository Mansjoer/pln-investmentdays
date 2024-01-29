<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Participant;
use App\Models\Reservation;
use Livewire\WithPagination;

class ReservationTable extends Component
{
    use WithPagination;

    // #[Url]
    public $search = '';

    public $precense, $category;

    public $pagination = 5;

    protected $listeners = ['refreshReservationTable' => '$refresh'];

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $reservations = Reservation::whereHas('participant', function ($q) use ($search) {
                $q->where('company', 'like', $search);
            })->get();
        } else {
            $reservations = Reservation::with('participant')->paginate($this->pagination);
        }
        return view('livewire.reservation-table', compact('reservations'));
    }
}
