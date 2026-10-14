@extends('layouts.app')

@section('title', $title)

@section('content')
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    
    <a href="{{ route('books.create') }}">Tambah Buku</a>
    
    <ul>
        @if ($books->count() > 0)
            @foreach ($books as $book)
                <h3>{{ $book->title }}</h3>
                <p>ID Buku: {{ $book->id }}</p>
                <p>Penulis: {{ $book->author }}</p>
                <p>Tahun Terbit: {{ $book->year }}</p>
                <p>Stok: {{ $book->stock }}</p>

                <a href="{{ route('books.show', $book->id) }}">Detail</a>
                |
                <a href="{{ route('books.edit', $book->id) }}">Edit</a>
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
            @endforeach
        @else
            <li>Tidak ada buku yang tersedia.</li>
        @endif
    </ul>
@endsection