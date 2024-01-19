<?php

namespace App\Models;

use App\Models\File;
use App\Models\Topic;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $guarded = [];

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    public function participant()
    {
        return $this->hasMany(Participant::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }
}
