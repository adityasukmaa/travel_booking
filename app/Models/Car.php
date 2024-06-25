<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'model',
        'tahun',
        'nomor_polisi',
        'kapasitas',
        'status_mobil',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
