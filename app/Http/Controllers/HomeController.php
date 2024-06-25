<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Travel;
use App\Models\Trip;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $travels = Travel::all();
        $trips = Trip::all();
        $locations = Location::all();
        return view('home', compact('travels', 'trips', 'locations'));
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
