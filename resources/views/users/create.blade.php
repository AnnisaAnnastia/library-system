@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="form-card">
        <h3>Tambah Pengguna</h3>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
                @error('role')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit">Simpan</button>
                <a href="{{ route('users.index') }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection