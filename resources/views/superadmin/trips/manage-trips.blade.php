@extends('superadmin.layouts_superadmin.main')

@section('title', 'Kelola Perjalanan')

@section('content')
<div class="container">
    <h1>Kelola Perjalanan</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('create-trip') }}" class="btn btn-primary mb-3">Tambah Perjalanan</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mobil</th>
                <th>Jadwal</th>
                <th>Travel</th>
                <th>Keberangkatan</th>
                <th>Tujuan</th>
                <th>Tanggal Keberangkatan</th>
                <th>Waktu Keberangkatan</th>
                <th>Harga Tiket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trips as $trip)
                <tr>
                    <td>{{ $trip->id }}</td>
                    <td>{{ $trip->car->merk }} {{ $trip->car->model }}</td>
                    <td>{{ $trip->schedule->hari }} {{ $trip->schedule->waktu_keberangkatan }}</td>
                    <td>{{ $trip->travel->nama_travel }}</td>
                    <td>{{ $trip->depatureLocation->depature }}</td>
                    <td>{{ $trip->destinationLocation->destination }}</td>
                    <td>{{ $trip->tanggal_keberangkatan }}</td>
                    <td>{{ $trip->waktu_keberangkatan }}</td>
                    <td>{{ $trip->harga_tiket }}</td>
                    <td>
                        <a href="{{ route('edit-trip', $trip->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-trip', $trip->id) }}" method="POST" style="display:inline-block;">
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