<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BookController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/userDashboard', [BookController::class, 'userIndex'])->middleware(['auth', 'verified'])->name('userDashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // admin
    Route::get('/dashboard/admin/books', [BookController::class, 'add'])->name('admin.books.add');
    Route::post('/dashboard/admin/books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/dashboard/admin/books/{book}', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::patch('/dashboard/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    Route::delete('/dashboard/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');

    // user
    Route::get('/dashboard/user/books', [BookController::class, 'addUserBook'])->name('user.books.add');
    Route::post('/dashboard/user/books', [BookController::class, 'storeUserBook'])->name('user.books.store');
    Route::get('/dashboard/user/books/{book}', [BookController::class, 'editUserBook'])->name('user.books.edit');
    Route::patch('/dashboard/user/books/{book}', [BookController::class, 'updateUserBook'])->name('user.books.update');
    Route::delete('/dashboard/user/books/{book}', [BookController::class, 'destroyUserBook'])->name('user.books.destroy');
    Route::get('/dashboard/user/books/{book}', [BookController::class, 'showUserBook'])->name('user.books.show');
});

require __DIR__ . '/auth.php';
