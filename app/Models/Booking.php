<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'trip_id',
        'tanggal_pemesanan',
        'jumlah_tiket',
        'status_pemesanan',
    ];

    // Relasi ke pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke trip
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
