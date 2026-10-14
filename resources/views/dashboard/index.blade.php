@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <h2>Ringkasan Data</h2>

    <ul>
        <li>
            <strong>Total Buku:</strong> {{ $bookCount }}
            | <a href="{{ route('books.index') }}">Lihat Buku</a>
        </li>
        <li>
            <strong>Total Member:</strong> {{ $memberCount }}
            | <a href="{{ route('members.index') }}">Lihat Member</a>
        </li>
        <li>
            <strong>Total Kategori:</strong> {{ $categoryCount }}
            | <a href="{{ route('categories.index') }}">Lihat Kategori</a>
        </li>
    </ul>

    <h2>Akses Cepat</h2>

    <ul>
        <li><a href="{{ route('books.create') }}">Tambah Buku</a></li>
        <li><a href="{{ route('members.create') }}">Tambah Member</a></li>
        <li><a href="{{ route('categories.create') }}">Tambah Kategori</a></li>
    </ul>

    <h2>Buku Terbaru</h2>

    <ul>
        @foreach ($latestBooks as $book)
            <li>
                <strong>{{ $book->title }}</strong><br>
                Penulis: {{ $book->author }}<br>
                Tahun Terbit: {{ $book->year }}<br>
                Stok: {{ $book->stock }}
            </li>
        @endforeach
    </ul>

    <p>
        <a href="{{ route('books.index') }}">Lihat Semua Buku</a>
    </p>
@endsection