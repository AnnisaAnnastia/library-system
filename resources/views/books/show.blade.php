@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    <p>ID Buku: {{ $book->id }}</p>
    <p>Judul: {{ $book->title }}</p>
    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun Terbit: {{ $book->year }}</p>
    <p>Stok: {{ $book->stock }}</p>
    
@endsection