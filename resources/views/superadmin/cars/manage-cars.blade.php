@extends('superadmin.layouts_superadmin.main')

@section('title', 'Manage Cars')

@section('content')
<div class="container mt-4">
    <h1>Kelola Mobil</h1>
    <a href="{{ route('create-car') }}" class="btn btn-primary mb-3">Tambahkan Mobil</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Merk</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Nomor Polisi</th>
                <th>Kapasitas</th>
                <th>Status Mobil</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->merk }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->tahun }}</td>
                    <td>{{ $car->nomor_polisi }}</td>
                    <td>{{ $car->kapasitas }}</td>
                    <td>{{ $car->status_mobil }}</td>
                    <td>
                        <a href="{{ route('edit-car', $car->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-car', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
