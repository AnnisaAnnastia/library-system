<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index(){
        $title = "Daftar Buku";
        $description = "Daftar buku yang tersedia di perpustakaan";

        $books = Book::all();

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function create(){
        $title = "Tambah Buku";
        
        return view('books.create', compact('title'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1901|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data Buku berhasil ditambahkan.');
    }

    public function show($book){
       $book = Book::findOrFail($book);
       $title = "Detail Buku";

       return view('books.show', compact('title', 'book'));
    }

    public function edit($book){
        $book = Book::findOrFail($book);
        $title = "Edit Buku";

        return view('books.edit', compact('title', 'book'));
    }

    public function update(Request $request, $book){
        $book = Book::findOrFail($book);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('books', 'title')->ignore($book->id)],
            'author' => 'required|string|max:255',
            'year' => 'required|integer|min:1901|max:' . date('Y'),
            'stock' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($book){
        $book = Book::findOrFail($book);
        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}