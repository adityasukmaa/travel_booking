@extends('superadmin.layouts_superadmin.main')

@section('title', 'Kelola Pemesanan')

@section('content')
<div class="container">
    <h1>Kelola Pemesanan</h1>
    <a href="{{ route('create-booking') }}" class="btn btn-primary">Buat Pemesanan</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Trip</th>
                <th>Tanggal Pemesanan</th>
                <th>Jumlah Tiket</th>
                <th>Status Pemesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->trip->name }}</td>
                    <td>{{ $booking->tanggal_pemesanan }}</td>
                    <td>{{ $booking->jumlah_tiket }}</td>
                    <td>{{ $booking->status_pemesanan }}</td>
                    <td>
                        <a href="{{ route('edit-booking', $booking->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-booking', $booking->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
