@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <h1>Edit Member</h1>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Member</label><br>
            <input type="text" name="name" value="{{ old('name', $member->name) }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email', $member->email) }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone" value="{{ old('phone', $member->phone) }}">
            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>
        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="{{ route('members.index') }}">Kembali ke Daftar Member</a></p>
@endsection