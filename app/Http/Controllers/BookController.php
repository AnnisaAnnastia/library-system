<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock
        ]);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($book);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock
        ]);

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
