<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/store', [UserController::class,'store'])->name('store');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('home');
    Route::any('/logout', [UserController::class,'logout'])->name('logout');
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('reviews', ReviewController::class);
});