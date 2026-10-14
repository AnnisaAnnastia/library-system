<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $description = "Selamat datang di Cia's Library System";

        $bookCount = Book::count();
        $memberCount = Member::count();
        $categoryCount = Category::count();

        $latestBooks = Book::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'title',
            'description',
            'bookCount',
            'memberCount',
            'categoryCount',
            'latestBooks'
        ));
    }
}
