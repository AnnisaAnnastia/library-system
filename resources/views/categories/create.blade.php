@extends('layouts.app')

@section('title', $title)

@push('styles')
    @vite('resources/css/categories/create.css')
@endpush

@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama Kategori</label><br>
            <input type="text" name="name" value="{{ old('name') }}">

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description') }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>
        <button type="submit">Simpan Kategori</button>
    </form>

    <p>
        <a href="{{ route('categories.index') }}">
            Kembali ke Daftar Kategori
        </a>
    </p>
@endsection
