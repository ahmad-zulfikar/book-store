<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/change-password', [AuthController::class, 'changePassword']);

    Route::post('/create-book', [BookController::class, 'createBook']);
    Route::post('/edit-book', [BookController::class, 'editBook']);
    Route::delete('/delete-book', [BookController::class, 'deleteBook']);
    Route::get('/list-book', [BookController::class, 'listBook']);
    Route::get('/get-book', [BookController::class, 'getBook']);
});
