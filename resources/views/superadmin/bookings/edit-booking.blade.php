@extends('superadmin.layouts_superadmin.main')

@section('title', 'Edit Pemesanan')

@section('content')
<div class="container">
    <h1>Edit Pemesanan</h1>
    <form action="{{ route('update-booking', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $booking->user_id) selected @endif>{{ $user->username }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="trip_id" class="form-label">Trip</label>
            <select class="form-control" id="trip_id" name="trip_id">
                @foreach($trips as $trip)
                    <option value="{{ $trip->id }}" @if($trip->id == $booking->trip_id) selected @endif>{{ $trip->id }}</option>
                @endforeach
            </select>
            @error('trip_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" value="{{ old('tanggal_pemesanan', $booking->tanggal_pemesanan) }}">
            @error('tanggal_pemesanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
            <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="{{ old('jumlah_tiket', $booking->jumlah_tiket) }}">
            @error('jumlah_tiket')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_pemesanan" class="form-label">Status Pemesanan</label>
            <select class="form-control" id="status_pemesanan" name="status_pemesanan">
                <option value="Pending" @if($booking->status_pemesanan == 'Pending') selected @endif>Pending</option>
                <option value="Confirmed" @if($booking->status_pemesanan == 'Confirmed') selected @endif>Confirmed</option>
                <option value="Cancelled" @if($booking->status_pemesanan == 'Cancelled') selected @endif>Cancelled</option>
            </select>
            @error('status_pemesanan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
    </form>
</div>
@endsection
