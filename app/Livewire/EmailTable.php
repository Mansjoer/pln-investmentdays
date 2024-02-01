<?php

namespace App\Livewire;

use Livewire\Component;
use App\Imports\EmailImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class EmailTable extends Component
{
    use WithFileUploads;
    public $file;

    public function importExcel()
    {
        $fileName = $this->file->getClientOriginalName();
        Excel::import(new EmailImport, $this->file->store('temp'));
        $this->dispatch('closeModal');
        $this->file = '';
        // dd($fileName);
    }

    public function modalClose()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.email-table');
    }
}
