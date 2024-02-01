<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Jobs\SendMailJob;
use App\Mail\SendInvitation;
use Illuminate\Http\Request;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $datas = Email::whereNotNull('cc')->get();
        return view('admin.pages.email.index');
    }

    public function blast()
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

    public function open(Request $request)
    {
    }
}
