@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Judul Buku</label><br>
            <input 
                type="text" 
                name="title"
                value="{{ old('title', $book->title) }}" required>

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Penulis</label><br>
            <input 
                type="text" 
                name="author"
                value="{{ old('author', $book->author) }}" required>

            @error('author')
                <p>{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Tahun Terbit</label><br>
            <input 
                type="number" 
                name="year"
                value="{{ old('year', $book->year) }}" required>

            @error('year')
                <p>{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label>Stok Buku</label><br>
            <input 
                type="number" 
                name="stock"
                value="{{ old('stock', $book->stock) }}"
                   min="0" required>
                   
            @error('stock')
                <p>{{ $message }}</p>            
            @enderror
        </p>

        <p>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @selected(old('category_id', $book->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p>{{ $message }}</p>
            @enderror
        </p>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>
@endsection