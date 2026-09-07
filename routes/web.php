<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; //supaya bisa menghubungkan dengan class bookcontroller yg seharusnya
use App\Http\Controllers\CategoryController; //supaya bisa menghubungkan dengan class categorycontroller yg seharusnya
use App\Http\Controllers\MemberController; //supaya bisa menghubungkan dengan class membercontroller

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/books', function () {
//    // return 'Daftar Buku';
//    return view('books.index');
//});

Route::get('/books', [BookController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);