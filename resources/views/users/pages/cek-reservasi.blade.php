@extends('users.layouts_user.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mt-1">Cek Reservasi Tiket Travel</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="kodeReservasi">Kode Reservasi</label>
                            <input type="text" class="form-control mt-3" id="kodeReservasi" name="kodeReservasi" placeholder="Masukkan Kode Reservasi" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Cek Reservasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Menambahkan Perjalanan --}}
<div class="container mt-4">
    <h1>Tambah Perjalanan</h1>
    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="car_id">Mobil</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->merk }} {{ $car->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="schedule_id">Jadwal</label>
            <select name="schedule_id" id="schedule_id" class="form-control">
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->hari }} {{ $schedule->waktu_keberangkatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="travel_id">Travel</label>
            <select name="travel_id" id="travel_id" class="form-control">
                @foreach($travels as $travel)
                    <option value="{{ $travel->id }}">{{ $travel->nama_travel }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="depature">Keberangkatan</label>
            <select name="depature" id="depature" class="form-control">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="destination">Tujuan</label>
            <select name="destination" id="destination" class="form-control">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
            <input type="date" name="tanggal_keberangkatan" id="tanggal_keberangkatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="waktu_keberangkatan">Waktu Keberangkatan</label>
            <input type="time" name="waktu_keberangkatan" id="waktu_keberangkatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_tiket">Harga Tiket</label>
            <input type="number" step="0.01" name="harga_tiket" id="harga_tiket" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Perjalanan</button>
    </form>
</div>

{{-- Menambahkan Pemesanan --}}
<div class="container mt-4">
    <h1>Tambah Pemesanan</h1>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="trip_id">Perjalanan</label>
            <select name="trip_id" id="trip_id" class="form-control">
                @foreach($trips as $trip)
                    <option value="{{ $trip->id }}">{{ $trip->travel->nama_travel }} - {{ $trip->depatureLocation->name }} ke {{ $trip->destinationLocation->name }} ({{ $trip->tanggal_keberangkatan }} {{ $trip->waktu_keberangkatan }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">User</label>
            <input type="text" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jumlah_tiket">Jumlah Tiket</label>
            <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pemesanan</button>
    </form>
</div>
@endsection