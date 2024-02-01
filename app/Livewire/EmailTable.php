<?php

namespace App\Livewire;

use App\Models\Email;
use Livewire\Component;
use App\Imports\EmailImport;
use App\Mail\SendInvitation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;
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
    }

    public function blastEmail()
    {
        $emails = Email::all();
        $time = now()->addSeconds(5);
        foreach ($emails as $email) {
            $data = [
                'name' => $email->name,
                'company' => $email->company,
                'position' => $email->position,
                'email' => $email->email,
                'cc' => $email->cc
            ];
            if ($email->cc == null) {
                $email = Mail::mailer('invitation')->to($email->email)->later($time, new SendInvitation($data));
            } else {
                $email = Mail::mailer('invitation')->to($email->email)->cc($email->cc)->later($time, new SendInvitation($data));
            }
        }
    }

    public function modalClose()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $emails = Email::all();
        return view('livewire.email-table', compact('emails'));
    }
}
