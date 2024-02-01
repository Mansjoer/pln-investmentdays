<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Participant;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $countParticipant = Participant::all();
        $countReservation = Reservation::all();
        $countTicket = Ticket::all();

        $participantStats = Participant::get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('F, d');
        }, true)->map->count();

        $participantKey = array();
        $participantCount = array();

        foreach ($participantStats as $key => $stats) {
            $participantKey[] = $key;
            $participantCount[] = $stats;
        };

        $reservationStats = Reservation::get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('F, d');
        }, true)->map->count();

        $reservationKey = array();
        $reservationCount = array();

        foreach ($reservationStats as $key => $stats) {
            $reservationKey[] = $key;
            $reservationCount[] = $stats;
        };


        return view('admin.pages.dashboard', compact(
            'countParticipant',
            'countReservation',
            'countTicket',
            'participantKey',
            'participantCount',
            'reservationKey',
            'reservationCount'
        ));
    }
}
