@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('members.create') }}">Tambah Member</a>
    </p>

    <ul>
        @foreach ($members as $member)
            <li>
                {{ $member->name }} - {{ $member->email }}

                @if ($member->phone)
                    - {{ $member->phone }}
                @endif

                | <a href="{{ route('members.edit', $member->id) }}">Edit</a>

                | <form action="{{ route('members.destroy', $member->id) }}"
                        method="POST"
                        style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus member ini?')">
                        Hapus
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection