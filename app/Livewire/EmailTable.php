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
        $this->file->storePubliclyAs('excel/', $fileName, 'public');
        $path = 'https://pln-investmentdays.com/storage/excel/' . $fileName;
        Excel::import(new EmailImport, $path);
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
