<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index() {
        Gate::authorize('viewAny', Book::class);

        $title = "Daftar Buku";
        $description = "Daftar buku yang tersedia di perpustakaan";
        $books = Book::with('category')->get();

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function create() {
        Gate::authorize('create', Book::class);

        $title = "Tambah Buku";
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('title', 'categories'));
    }

    public function store(Request $request) {
        Gate::authorize('create', Book::class);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1901|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku berhasil ditambahkan.');
    }

    public function show($book) {
       $book = Book::with('category')->findOrFail($book);

       Gate::authorize('view', $book);

       $title = "Detail Buku";

       return view('books.show', compact('title', 'book'));
    }

    public function edit($book) {
        $book = Book::findOrFail($book);

        Gate::authorize('update', $book);

        $title = "Edit Buku";
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('title', 'book', 'categories'));
    }

    public function update(Request $request, $book) {
        $book = Book::findOrFail($book);

        Gate::authorize('update', $book);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('books', 'title')->ignore($book->id)],
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1901|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($book) {
        $book = Book::findOrFail($book);
        
        Gate::authorize('delete', $book);
        
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}