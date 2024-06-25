@extends ('superadmin.layouts_superadmin.main')

@section ('title' , 'Data Travel')

@section ('content')
<div class="container">
    <h1>Kelola Travels</h1>
    <a href="{{ route('create-travel') }}" class="btn btn-primary">Buat Travel Baru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Travel</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($travels as $travel)
                <tr>
                    <td>{{ $travel->id }}</td>
                    <td>{{ $travel->nama_travel }}</td>
                    <td>{{ $travel->kontak }}</td>
                    <td>{{ $travel->alamat }}</td>
                    <td>
                        <a href="{{ route('edit-travel', $travel->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-travel', $travel->id) }}" method="POST" style="display:inline;">
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