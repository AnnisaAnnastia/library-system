@extends('layouts.app')

@section('title', 'Edit Kategori')

@push('styles')
    @vite('resources/css/categories/edit.css')
@endpush

@section('content')
    <h1>Edit Kategori</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama Kategori</label><br>
            <input type="text" name="name"
                value="{{ old('name', $category->name) }}">

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description', $category->description) }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <br>
        <button type="submit">Simpan Perubahan</button>
    </form>

    <p>
        <a href="{{ route('categories.index') }}">Kembali ke Daftar Kategori</a>
    </p>
@endsection
