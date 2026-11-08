@extends('layouts.app')

@push('styles')
    @vite('resources/css/books/index.css')
@endpush

@section('title', $title)

@section('content')
        <p>{{ $description }}</p>
        
        @can('create', App\Models\Book::class)
            <a href="{{ route('books.create') }}">Tambah Buku</a>
        @endcan
        
        <ul>
            @if ($books->count() > 0)
                @foreach ($books as $book)
                    <li class="book-card">
                        <h3>{{ $book->title }}</h3>
                        <p>ID Buku: {{ $book->id }}</p>
                        <p>Penulis: {{ $book->author }}</p>
                        <p>Tahun Terbit: {{ $book->year }}</p>
                        <p>Stok: {{ $book->stock }}</p>
                        <p>Kategori: {{ $book->category->name ?? 'Belum ada kategori' }}</p>

                        <div class="book-actions">
                            @can('view', $book)
                                <a href="{{ route('books.show', $book->id) }}">Detail</a>
                            @endcan

                            @can('update', $book)
                                <a href="{{ route('books.edit', $book->id) }}"> Edit</a>
                            @endcan

                            @can('delete', $book)
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
                            @endcan
                        </div>
                    </li>
                @endforeach
            @else
                <li>Tidak ada buku yang tersedia.</li>
            @endif
        </ul>
@endsection