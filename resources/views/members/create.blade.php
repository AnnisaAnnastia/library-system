
@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Member</label><br>
            <input type="text" name="name"
                   value="{{ old('name') }}">

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email') }}">

            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone"
                   value="{{ old('phone') }}">

            @error('phone')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>
        <button type="submit">Simpan Member</button>
    </form>

    <p>
        <a href="{{ route('members.index') }}">Kembali ke Daftar Member</a>
    </p>
@endsection