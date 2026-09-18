<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $description = "Selamat datang di Library System Cia";

        $bookCount = 9;
        $memberCount = 5;
        $categoryCount = 5;

        return view('dashboard.index', compact(
            'title',
            'description',
            'bookCount',
            'memberCount',
            'categoryCount'
        ));
    }
}
