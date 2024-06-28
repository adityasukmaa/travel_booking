@extends ('superadmin.layouts_superadmin.main')

@section ('title' , 'Buat Travel')

@section ('content')
<div class="container">
    <h1>Buat Travel</h1>
    <form action="{{ route('store-travel') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_travel" class="form-label">Nama Travel</label>
            <input type="text" class="form-control" id="nama_travel" name="nama_travel" value="{{ old('nama_travel') }}">
            @error('nama_travel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}">
            @error('kontak')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Buat</button>
    </form>
</div>
@endsection