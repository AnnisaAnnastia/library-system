@extends('layouts.app')

@section('title', $title)

@push('styles')
    @vite('resources/css/categories/index.css')
@endpush

@section('content')
    <div class="categories-page">

        <p class="categories-description">{{ $description }}</p>

        @if (session('success'))
            <p class="categories-alert">{{ session('success') }}</p>
        @endif

        <div class="categories-header">
            <a href="{{ route('categories.create') }}" class="add-category-btn">
                + Tambah Kategori
            </a>
        </div>

        <ul class="categories-list">
            @foreach ($categories as $category)
                <li class="category-card">

                    <div class="category-info">
                        <span class="category-name">{{ $category->name }}</span>

                        @if ($category->description)
                            <span class="category-description">
                                {{ $category->description }}
                            </span>
                        @endif
                    </div>

                    <div class="category-actions">
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="edit-category-btn">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}"
                              method="POST"
                              class="delete-category-form">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete-category-btn"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>

    </div>
@endsection