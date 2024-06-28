@extends ('superadmin.layouts_superadmin.main')

@section ('title' , 'Data Pengguna')

@section ('content')
<div class="container card-body">
    <h1 class="mt-4">Manage Users</h1>
    <a href="{{ route('create-user') }}" class="btn btn-primary">Buat Pengguna Baru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('edit-user', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('delete-user', $user->id) }}" method="POST" style="display:inline;">
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