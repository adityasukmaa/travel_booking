@extends('superadmin.layouts_superadmin.main')

@section('title', 'Kelola Lokasi')

@section('content')
<div class="container">
    <h1>Kelola Lokasi</h1>
    <a href="{{ route('create-location') }}" class="btn btn-primary">Buat Lokasi Baru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Keberangkatan</th>
                <th>Tujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td>{{ $location->id }}</td>
                    <td>{{ $location->depature }}</td>
                    <td>{{ $location->destination }}</td>
                    <td>
                        <a href="{{ route('edit-location', $location->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-location', $location->id) }}" method="POST" style="display:inline;">
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
