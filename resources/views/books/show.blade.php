@extends('layouts.app')

@section('title', $title)

@push('styles')
    @vite('resources/css/books/show.css')
@endpush

@section('content')

    <div class="detail-card">
        <p>ID Buku: {{ $book->id }}</p>
        <p>Judul: {{ $book->title }}</p>
        <p>Penulis: {{ $book->author }}</p>
        <p>Tahun Terbit: {{ $book->year }}</p>
        <p>Stok: {{ $book->stock }}</p>
        <p>Kategori: {{ $book->category->name ?? 'Belum ada kategori' }}</p>
    </div>
    
    <div class="detail-actions">
        <a href="{{ route('books.edit', $book->id) }}">Edit Buku</a>
        <a href="{{ route('books.index') }}">Kembali</a>
    </div>
@endsection