@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>

    <p>{{ $description }}</p>

    <ul>
        <li>Jumlah Buku: {{ $bookCount }}</li>
        <li>Jumlah Member: {{ $memberCount }}</li>
        <li>Jumlah Kategori: {{ $categoryCount }}</li>
    </ul>
@endsection