<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        // $email = Email::where('token', $request->token)->firstOrFail();
        // $token = $email->token;

        return view('reservation.index');
    }
}
