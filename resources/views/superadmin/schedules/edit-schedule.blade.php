@extends('superadmin.layouts_superadmin.main')

@section('content')
<div class="container">
    <h1>Edit Jadwal</h1>
    <form action="{{ route('update-schedule', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" class="form-control" id="hari" name="hari" value="{{ old('hari', $schedule->hari) }}">
            @error('hari')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="waktu_keberangkatan" class="form-label">Waktu Keberangkatan</label>
            <input type="time" class="form-control" id="waktu_keberangkatan" name="waktu_keberangkatan" value="{{ old('waktu_keberangkatan', $schedule->waktu_keberangkatan) }}">
            @error('waktu_keberangkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
    </form>
</div>
@endsection