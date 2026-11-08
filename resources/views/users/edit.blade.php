@extends('layouts.app')

@section('title', 'Edit Pengguna')

@push('styles')
    @vite('resources/css/users/edit.css')
@endpush

@section('content')
    <div class="form-card">
        <h3>Edit Pengguna</h3>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password">
                <small>Kosongkan jika tidak ingin mengganti password.</small>
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role">
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
                @error('role')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('users.index') }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection