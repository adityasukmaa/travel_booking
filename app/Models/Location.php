<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'depature', 'destination',
    ];

    public function depatureTrips()
    {
        return $this->hasMany(Trip::class, 'depature');
    }

    public function destinationTrips()
    {
        return $this->hasMany(Trip::class, 'destination');
    }
}
