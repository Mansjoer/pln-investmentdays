<?php

namespace App\Http\Controllers\Admin;

use App\Models\Zone;
use App\Models\Participant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    public function index()
    {
        return view('admin.pages.participant.index');
    }

    public function details($id)
    {
        $participant = Participant::find($id);
        return view('admin.pages.participant.details', compact('participant'));
    }
}
