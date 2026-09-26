@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title}} </h1>
    <p> {{ $description }} </p>

    <ul>
        @foreach ($books as $book)
        <li>
            <h3>{{ $book->title }}</h3>
            <p>ID Buku: {{ $book->id }}</p>
            <p>Penulis: {{ $book->author }}</p>
            <p>Tahun: {{ $book->year }}</p>
            <p>Stok: {{ $book->stock }}</p>
            <hr>
        </li>
        @endforeach
    </ul>
@endsection