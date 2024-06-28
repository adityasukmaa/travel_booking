@extends('superadmin.layouts_superadmin.main')

@section('title', 'Edit Lokasi')

@section('content')
<div class="container">
    <h1>Edit Lokasi</h1>
    <form action="{{ route('update-location', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="depature" class="form-label">Keberangkatan</label>
            <input type="text" class="form-control" id="depature" name="depature" value="{{ old('depature', $location->depature) }}">
            @error('depature')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $location->destination) }}">
            @error('destination')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
    </form>
</div>
@endsection
