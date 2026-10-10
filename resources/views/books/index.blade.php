@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title}} </h1>
    <p> {{ $description }} </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('books.create') }}">Tambah Buku</a>
    </p>

    <ul>
        @forelse ($books as $book)
        <li>
            <h3>{{ $book->title }}</h3>
            <p>ID Buku: {{ $book->id }}</p>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun: {{ $book->year }}</p>
            <p>Stok: {{ $book->stock }}</p>

            <a href="{{ route('books.show', $book->id) }}">
                Detail
            </a>

            |

            <a href="{{ route('books.edit', $book->id) }}">
                Edit
            </a>

            |
            <form action="{{ route('books.destroy', $book->id) }}" 
                method="POST" 
                style="display: inline;">
                @csrf
                @method('DELETE')
                
                <button type="submit" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                    Hapus
                </button>
            </form>

            <hr>
        </li>
    @empty
        <li>Tidak ada buku yang tersedia.</li>
    @endforelse
    </ul>
@endsection