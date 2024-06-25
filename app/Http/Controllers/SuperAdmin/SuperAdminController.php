<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Travel;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function dashboard()
    {
        return view('superadmin.pages.index');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('superadmin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('superadmin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:user,admin,superadmin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-user')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('manage-users')->with('success', 'Pengguna Berhasil Dibuat.');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('superadmin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,superadmin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-user', $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('manage-users')->with('success', 'Pengguna Berhasil Diperbaharui.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manage-users')->with('success', 'Pengguna Berhasil Dihapus.');
    }


    // Display a listing of travels
    public function manageTravels()
    {
        $travels = Travel::all();
        return view('superadmin.travels.manage-travels', compact('travels'));
    }

    // Show the form for creating a new travel
    public function createTravel()
    {
        $locations = Location::all();
        $schedules = Schedule::all();
        $cars = Car::all();
        return view('superadmin.travels.create-travel', compact('locations', 'schedules', 'cars'));
    }

    // Store a newly created travel in storage
    public function storeTravel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_travel' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-travel')
                ->withErrors($validator)
                ->withInput();
        }

        Travel::create([
            'nama_travel' => $request->nama_travel,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('manage-travels')->with('success', 'Travel berhasil dibuat.');
    }

    // Show the form for editing the specified travel
    public function editTravel($id)
    {
        $travel = Travel::findOrFail($id);
        $locations = Location::all();
        $schedules = Schedule::all();
        $cars = Car::all();
        return view('superadmin.travels.edit-travel', compact('travel', 'locations', 'schedules', 'cars'));
    }

    // Update the specified travel in storage
    public function updateTravel(Request $request, $id)
    {
        $travel = Travel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_travel' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-travel', $travel->id)
                ->withErrors($validator)
                ->withInput();
        }

        $travel->update([
            'nama_travel' => $request->nama_travel,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('manage-travels')->with('success', 'Travel berhasil diubah.');
    }

    // Remove the specified travel from storage
    public function deleteTravel($id)
    {
        $travel = Travel::findOrFail($id);
        $travel->delete();

        return redirect()->route('manage-travels')->with('success', 'Travel berhasil dihapus.');
    }



    // Display a listing of locations
    public function manageLocations()
    {
        $locations = Location::all();
        return view('superadmin.locations.manage-locations', compact('locations'));
    }

    // Show the form for creating a new location
    public function createLocation()
    {
        return view('superadmin.locations.create-location');
    }

    // Store a newly created location in storage
    public function storeLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'depature' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-location')
                ->withErrors($validator)
                ->withInput();
        }

        Location::create([
            'depature' => $request->depature,
            'destination' => $request->destination,
        ]);

        return redirect()->route('manage-locations')->with('success', 'Lokasi berhasil dibuat.');
    }

    // Show the form for editing the specified location
    public function editLocation($id)
    {
        $location = Location::findOrFail($id);
        return view('superadmin.locations.edit-location', compact('location'));
    }

    // Update the specified location in storage
    public function updateLocation(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'depature' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-location', $location->id)
                ->withErrors($validator)
                ->withInput();
        }

        $location->update([
            'depature' => $request->depature,
            'destination' => $request->destination,
        ]);

        return redirect()->route('manage-locations')->with('success', 'Lokasi berhasil diubah.');
    }

    // Remove the specified location from storage
    public function deleteLocation($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('manage-locations')->with('success', 'Lokasi berhasil dihapus.');
    }

    // Display a listing of schedules
    public function manageSchedules()
    {
        $schedules = Schedule::all();
        return view('superadmin.schedules.manage-schedules', compact('schedules'));
    }

    // Show the form for creating a new schedule
    public function createSchedule()
    {
        return view('superadmin.schedule.create-schedule');
    }

    // Store a newly created schedule in storage
    public function storeSchedule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|string|max:10',
            'waktu_keberangkatan' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-schedule')
                ->withErrors($validator)
                ->withInput();
        }

        Schedule::create([
            'hari' => $request->hari,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
        ]);

        return redirect()->route('manage-schedules')->with('success', 'Jadwal behasil dibuat.');
    }

    // Show the form for editing the specified schedule
    public function editSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('superadmin.schedules.edit-schedule', compact('schedule'));
    }

    // Update the specified schedule in storage
    public function updateSchedule(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'hari' => 'required|string|max:10',
            'waktu_keberangkatan' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-schedule', $schedule->id)
                ->withErrors($validator)
                ->withInput();
        }

        $schedule->update([
            'hari' => $request->hari,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
        ]);

        return redirect()->route('manage-schedules')->with('success', 'Jadwal berhasil diubah.');
    }

    // Remove the specified schedule from storage
    public function deleteSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('manage-schedules')->with('success', 'Jadwal berhasil dihapus.');
    }


    // Display a listing of bookings
    public function manageBookings()
    {
        $bookings = Booking::with(['user', 'trip'])->get();
        return view('superadmin.bookings.manage-bookings', compact('bookings'));
    }

    // Show the form for creating a new booking
    public function createBooking()
    {
        $users = User::all();
        $trips = Trip::all();
        return view('superadmin.bookings.create-booking', compact('users', 'trips'));
    }

    // Store a newly created booking in storage
    public function storeBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'tanggal_pemesanan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'status_pemesanan' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-booking')
                ->withErrors($validator)
                ->withInput();
        }

        Booking::create([
            'user_id' => $request->user_id,
            'trip_id' => $request->trip_id,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect()->route('manage-bookings')->with('success', 'Pemesanan berhasil dibuat.');
    }

    // Show the form for editing the specified booking
    public function editBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $trips = Trip::all();
        return view('superadmin.bookings.edit-booking', compact('booking', 'users', 'trips'));
    }

    // Update the specified booking in storage
    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'tanggal_pemesanan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'status_pemesanan' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit-booking', $booking->id)
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update([
            'user_id' => $request->user_id,
            'trip_id' => $request->trip_id,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect()->route('manage-bookings')->with('success', 'Pemesanan berhasil diperbaharui.');
    }

    // Remove the specified booking from storage
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('manage-bookings')->with('success', 'Pemesanan berhasil dihapus.');
    }



    // Display a listing of trips
    public function manageTrips()
    {
        $trips = Trip::with(['car', 'schedule', 'travel', 'depatureLocation', 'destinationLocation'])->get();
        return view('superadmin.trips.manage-trips', compact('trips'));
    }

    // Show the form for creating a new trip
    public function createTrip()
    {
        $cars = Car::all();
        $schedules = Schedule::all();
        $travels = Travel::all();
        $locations = Location::all();
        return view('superadmin.trips.create-trip', compact('cars', 'schedules', 'travels', 'locations'));
    }

    // Store a newly created trip in storage
    public function storeTrip(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'schedule_id' => 'required|exists:schedules,id',
            'travel_id' => 'required|exists:travels,id',
            'depature' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id',
            'tanggal_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'harga_tiket' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create-trip')
                ->withErrors($validator)
                ->withInput();
        }

        Trip::create([
            'car_id' => $request->car_id,
            'schedule_id' => $request->schedule_id,
            'travel_id' => $request->travel_id,
            'depature' => $request->depature,
            'destination' => $request->destination,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
            'harga_tiket' => $request->harga_tiket,
        ]);

        return redirect()->route('manage-trips')->with('success', 'Perjalanan berhasil dibuat.');
    }

    // Show the form for editing the specified trip
    public function editTrip($id)
    {
        $trip = Trip::findOrFail($id);
        $cars = Car::all();
        $schedules = Schedule::all();
        $travels = Travel::all();
        $locations = Location::all();
        return view('superadmin.trips.edit-trip', compact('trip', 'cars', 'schedules', 'travels', 'locations'));
    }

    // Update the specified trip in storage
    public function updateTrip(Request $request, $id)
    {
        // Temukan trip berdasarkan ID, jika tidak ditemukan, munculkan error 404
        $trip = Trip::findOrFail($id);

        // Validasi input dari request
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,id',
            'schedule_id' => 'required|exists:schedules,id',
            'travel_id' => 'required|exists:travels,id',
            'depature' => 'required|exists:locations,id',
            'destination' => 'required|exists:locations,id',
            'tanggal_keberangkatan' => 'required|date',
            'waktu_keberangkatan' => 'required|date_format:H:i',
            'harga_tiket' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembali ke halaman edit-trip dengan pesan error
        if ($validator->fails()) {
            return redirect()->route('edit-trip', $trip->id)
                ->withErrors($validator)
                ->withInput();
        }

        // Update data trip dengan data yang valid
        $trip->update([
            'car_id' => $request->car_id,
            'schedule_id' => $request->schedule_id,
            'travel_id' => $request->travel_id,
            'depature' => $request->depature,
            'destination' => $request->destination,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'waktu_keberangkatan' => $request->waktu_keberangkatan,
            'harga_tiket' => $request->harga_tiket,
        ]);

        // Redirect ke halaman manage-trips dengan pesan sukses
        return redirect()->route('manage-trips')->with('success', 'Perjalanan berhasil diperbaharui.');
    }

    // Remove the specified trip from storage
    public function deleteTrip($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('manage-trips')->with('success', 'Perjalanan berhasil dihapus.');
    }


    public function reportBookings()
    {
        // Ambil semua data pemesanan
        $bookings = Booking::with(['travel', 'depature', 'destination'])->get();

        // Tampilkan view laporan pemesanan dengan data pemesanan
        return view('superadmin.reports.report-bookings', compact('bookings'));
    }

    
}
