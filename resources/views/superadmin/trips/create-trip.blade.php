@extends('superadmin.layouts_superadmin.main')

@section('title', 'Tambah Perjalanan')

@section('content')
<div class="container mt-4">
    <h1>Tambah Perjalanan</h1>
    <form action="{{ route('store-trip') }}" method="POST">
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
                    <option value="{{ $location->id }}">{{ $location->depature }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="destination">Tujuan</label>
            <select name="destination" id="destination" class="form-control">
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->destination }}</option>
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
@endsection