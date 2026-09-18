<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $title = "Daftar Buku";
        $description = "Daftar buku yang tersedia di perpustakaan";
        $books = [
            ['Laut Bercerita', 'Leila S. Chudori', 2017],
            ['Filosofi Teras', 'Henry Manampiring', 2018],
            ['Pemrograman Web', 'Dr. Priyanto H.', 2021],
            ['Bumi', 'Tere Liye', 2014],
            ['Biografi B.J. Habibie', 'A. Makmur Makka', 2010],
            ['Sejarah Indonesia', 'Ricklefs', 2008],
            ['Perahu Kertas', 'Dee Lestari', 2009],
            ['Sapiens', 'Yuval Noah Harari', 2011],
            ['Negeri 5 Menara', 'Ahmad Fuadi', 2009]
        ];  

        $stock = 9;

        return view('books.index', compact('title', 'description', 'books', 'stock'));
    }

    public function show($id)
    {
       $title = "Detail Buku";
       
       return view('books.show', compact('title', 'id'));
    }
}
