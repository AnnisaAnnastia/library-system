@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    
    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label>Judul Buku</label><br>
            <input 
                type="text" 
                name="title" 
                placeholder="Masukkan judul buku"
                value="{{ old('title') }}">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Penulis</label><br>
            <input 
                type="text" 
                name="author"
                placeholder="Masukkan nama penulis"
                value="{{ old('author') }}">

            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Tahun Terbit</label><br>
            <input 
                type="number" 
                name="year"
                placeholder="Masukkan tahun terbit"
                value="{{ old('year') }}">

            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Stok Buku</label><br>
            <input 
                type="number" 
                name="stock" 
                placeholder="Masukkan stok buku"
                value="{{ old('stock') }}">
        
            @error('stock')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">Pilih kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit"> Simpan Buku </button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>
@endsection