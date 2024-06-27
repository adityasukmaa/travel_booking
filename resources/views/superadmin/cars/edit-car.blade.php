@extends('superadmin.layouts_superadmin.main')

@section('title', 'Edit Car')

@section('content')
<div class="container mt-4">
    <h1>Edit Car</h1>
    <form action="{{ route('update-car', $car->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control" value="{{ $car->merk }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ $car->model }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $car->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control" value="{{ $car->nomor_polisi }}" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ $car->kapasitas }}" required>
        </div>
        <div class="form-group">
            <label for="status_mobil">Status Mobil</label>
            <select name="status_mobil" id="status_mobil" class="form-control" required>
                <option value="Tersedia" {{ $car->status_mobil == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $car->status_mobil == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Car</button>
    </form>
</div>
@endsection
