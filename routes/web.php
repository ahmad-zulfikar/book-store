<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ViewBookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/home', [IndexController::class, 'home']);
Route::get('/create-book', [ViewBookController::class, 'createBook'])->name('create-book');
Route::get('/edit-book', [ViewBookController::class, 'editBook'])->name('edit-book');
Route::get('/delete-book', [ViewBookController::class, 'deleteBook'])->name('delete-book');
Route::get('/list-books', [ViewBookController::class, 'listBooks'])->name('list-book');
Route::get('/change-password', [ViewBookController::class, 'changePassword'])->name('change-password');
