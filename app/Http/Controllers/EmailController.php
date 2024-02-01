<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Mail\Attachment;

class EmailController extends Controller
{
    public function index()
    {
        return view('admin.pages.email.index');
    }

    public function open(Request $request)
    {
    }
}
