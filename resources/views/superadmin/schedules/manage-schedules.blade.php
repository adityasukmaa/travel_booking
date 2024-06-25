@extends ('superadmin.layouts_superadmin.main')

@section ('title', 'Kelola Jadwal')

@section ('content')
<div class="container">
    <h1>Kelola Jadwal</h1>
    <a href="{{ route('create-schedule') }}" class="btn btn-primary">Buat Jadwal Baru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hari</th>
                <th>Waktu Keberangkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->hari }}</td>
                    <td>{{ $schedule->waktu_keberangkatan }}</td>
                    <td>
                        <a href="{{ route('edit-schedule', $schedule->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-schedule', $schedule->id) }}" method="POST" style="display:inline;">
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