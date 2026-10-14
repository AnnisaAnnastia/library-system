@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p> {{ $description }} </p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('categories.create') }}">Tambah Kategori</a>
    </p>

    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}

                @if ($category->description) 
                    - {{ $category->description }}
                @endif

                | <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
  
                | <form action="{{ route('categories.destroy', $category->id) }}"
                        method="POST"
                        style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                        Hapus
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection