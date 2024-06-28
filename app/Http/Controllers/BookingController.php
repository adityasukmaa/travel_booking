<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // Menampilkan formulir pemesanan
    public function showBookingForm()
    {
        $trips = Trip::all();

        return view('index', compact('trips'));
    }

    // Menyimpan data pemesanan
    public function storeBooking(Request $request)
    {
        // Validasi input
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'tanggal_pemesanan' => 'required|date|after_or_equal:today',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        // Menyimpan data pemesanan
        Booking::create([
            'user_id' => Auth::id(),
            'trip_id' => $request->trip_id,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_pemesanan' => 'Pending',
        ]);

        // Redirect ke halaman sukses pemesanan
        return redirect()->route('booking.success')->with('success', 'Booking successfully created!');
    }

    // Menampilkan halaman sukses pemesanan
    public function showSuccessPage()
    {
        return view('booking.success');
    }


    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('bookings.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        $trip = Trip::findOrFail($request->trip_id);
        $total_harga = DB::select('SELECT calculateTotalPrice(?, ?)', [$trip->harga_tiket, $request->jumlah_tiket])[0]->calculateTotalPrice;

        Booking::create([
            'trip_id' => $request->trip_id,
            'user_id' => $request->user_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Pemesanan tiket berhasil.');
    }
}
