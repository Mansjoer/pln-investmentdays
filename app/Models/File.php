<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $guarded = [];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}