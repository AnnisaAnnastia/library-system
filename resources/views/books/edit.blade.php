@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Judul Buku</label><br>
            <input type="text" name="title"
                   value="{{ old('title', $book->title) }}" required>
        </p>

        <p>
            <label>Penulis</label><br>
            <input type="text" name="author"
                   value="{{ old('author', $book->author) }}" required>
        </p>

        <p>
            <label>Tahun Terbit</label><br>
            <input type="number" name="year"
                   value="{{ old('year', $book->year) }}" required>
        </p>

        <p>
            <label>Stok Buku</label><br>
            <input type="number" name="stock"
                   value="{{ old('stock', $book->stock) }}"
                   min="0" required>
        </p>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
    </p>
@endsection
