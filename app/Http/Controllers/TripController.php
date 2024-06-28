<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Travel;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class TripController extends Controller
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'schedule_id', 'travel_id', 'departure', 'destination', 'tanggal_keberangkatan', 'waktu_keberangkatan', 'harga_tiket'
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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        $cars = Car::all();
        $schedules = Schedule::all();
        $travels = Travel::all();
        $locations = Location::all();
        return view('trips.create', compact('cars', 'schedules', 'travels', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'schedule_id' => 'required|exists:schedules,id',
            'travel_id' => 'required|exists:travels,id',
            'depature' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id',
            'tanggal_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'harga_tiket' => 'required|numeric',
        ]);

        Trip::create($request->all());

        return redirect()->route('trips.index')->with('success', 'Perjalanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $cars = Car::all();
        $schedules = Schedule::all();
        $travels = Travel::all();
        $locations = Location::all();
        return view('trips.edit', compact('trip', 'cars', 'schedules', 'travels', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'schedule_id' => 'required|exists:schedules,id',
            'travel_id' => 'required|exists:travels,id',
            'depature' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id',
            'tanggal_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'harga_tiket' => 'required|numeric',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update($request->all());

        return redirect()->route('trips.index')->with('success', 'Perjalanan berhasil diperbaharui.');
    }
}
