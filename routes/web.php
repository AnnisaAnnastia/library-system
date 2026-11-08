<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\MemberController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name ('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
    return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('books', BookController::class);
    
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('members', MemberController::class)->except(['show']);
});

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});