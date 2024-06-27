@extends('superadmin.layouts_superadmin.main')

@section('title', 'Create Car')

@section('content')
<div class="container mt-4">
    <h1>Create Car</h1>
    <form action="{{ route('store-car') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="merk">Merk</label>
            <input type="text" name="merk" id="merk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nomor_polisi">Nomor Polisi</label>
            <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status_mobil">Status Mobil</label>
            <select name="status_mobil" id="status_mobil" class="form-control" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Car</button>
    </form>
</div>
@endsection
