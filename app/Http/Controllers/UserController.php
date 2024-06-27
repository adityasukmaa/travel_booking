<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Travel;
use App\Models\Trip;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('users.pages.index');
        $travels = Travel::all();
        $trips = Trip::all();
        $locations = Location::all();
        return view('home', compact('travels', 'trips', 'locations'));
    }
}
