<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Location;
use App\Models\Travel;
use App\Models\Trip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $travels = Travel::all();
        $trips = Trip::all();
        $locations = Location::all();
        return view('home', compact('cars', 'travels', 'trips', 'locations'));
    }

    public function cekReservasi()
    {
        return view('cek-reservasi');
    }

    public function kebijakan()
    {
        return view('kebijakan');
    }

    public function tentangKami()
    {
        return view('tentang-kami');
    }
}
