<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'schedule_id',
        'travel_id',
        'depature',
        'destination',
        'tanggal_keberangkatan',
        'waktu_keberangkatan',
        'harga_tiket',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }

    public function depatureLocation()
    {
        return $this->belongsTo(Location::class, 'depature');
    }

    public function destinationLocation()
    {
        return $this->belongsTo(Location::class, 'destination');
    }
}
