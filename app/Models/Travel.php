<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';

    protected $fillable = [
        'nama_travel',
        'kontak',
        'alamat',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    // Relasi ke trip
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
