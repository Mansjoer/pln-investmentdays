<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($code)
    {
        $ticket = Ticket::where('code', $code)->firstOrFail();
        return view('ticket', compact('ticket'));
    }
}