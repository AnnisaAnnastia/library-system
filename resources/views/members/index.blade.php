@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p> {{ $description }} </p>

    <ul>
        @foreach ($members as $member)
            <li>{{ $member }}</li>
        @endforeach
    </ul>
@endsection