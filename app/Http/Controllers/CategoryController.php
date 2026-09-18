<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $title = "Kategori Buku";
        $description = "Daftar kategori buku";
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Pendidikan',
            'Sejarah',
            'Biografi'
        ];
        
        return view('categories.index', compact('title', 'description', 'categories'));
    }
}