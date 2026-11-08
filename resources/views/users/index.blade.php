@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <h3>Daftar Pengguna</h3>

    <a href="{{ route('users.create') }}">Tambah Pengguna</a>

    <ul>
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <li>
                    <h4>{{ $user->name }}</h4>
                    <p>Email: {{ $user->email }}</p>
                    <p>Role: {{ ucfirst($user->role) }}</p>

                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>

                    <form action="{{ route('users.destroy', $user->id) }}"
                          method="POST"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                            Hapus
                        </button>
                    </form>
                </li>
            @endforeach
        @else
            <li>Belum ada pengguna.</li>
        @endif
    </ul>
@endsection