@extends('superadmin.layouts_superadmin.main')

@section('title' , 'Buat Jadwal')

@section('content')
<div class="container">
    <h1>Buat Jadwal</h1>
    <form action="{{ route('store-schedule') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" value="{{ old('hari') }}">
            @error('hari')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="waktu_keberangkatan" class="form-label">Waktu Keberangkatan</label>
            <input type="time" class="form-control" id="waktu_keberangkatan" name="waktu_keberangkatan" value="{{ old('waktu_keberangkatan') }}">
            @error('waktu_keberangkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Buat</button>
    </form>
</div>
@endsection