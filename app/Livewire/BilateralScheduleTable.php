<?php

namespace App\Livewire;

use App\Models\BilateralSchedule;
use Livewire\Component;

class BilateralScheduleTable extends Component
{
    public $search = '';

    public $pagination = 5;

    public function create()
    {
    }

    public function modalClose()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        if (strlen($this->search >= 2)) {
            $schedules = BilateralSchedule::where('name', 'LIKE', $search)
                ->orderBy('name')
                ->get();
        } else {
            $schedules = BilateralSchedule::orderBy('name')->paginate($this->pagination);
        }
        return view('livewire.bilateral-schedule-table', compact('schedules'));
    }
}
