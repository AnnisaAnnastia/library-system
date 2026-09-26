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

    public function show($id)
    {
       $book = Book::findOrFail($id);
       $title = "Detail Buku";

       return view('books.show', compact('title', 'book'));
    }
}
