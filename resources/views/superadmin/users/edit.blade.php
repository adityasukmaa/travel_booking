@extends ('superadmin.layouts_superadmin.main')

@section ('title', 'Edit User')

@section ('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('update-user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="user" @if($user->role == 'user') selected @endif>User</option>
                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                <option value="superadmin" @if($user->role == 'superadmin') selected @endif>Super Admin</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
    </form>
</div>
@endsection