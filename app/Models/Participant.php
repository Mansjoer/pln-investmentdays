<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Reservation;
use App\Models\HospitalityContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;

    protected $table = 'participants';

    protected $guarded = [];

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function hospitality()
    {
        return $this->hasMany(HospitalityContact::class);
    }
}
