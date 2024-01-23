<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $guarded = [];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }

    public function zone()
    {
        return $this->hasOne(Zone::class);
    }
}
