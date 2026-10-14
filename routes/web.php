<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\MemberController; 
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('members', MemberController::class)->except(['show']);