<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.pages.reservation.index');
    }

    public function details($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.pages.reservation.details', compact('reservation'));
    }
}
