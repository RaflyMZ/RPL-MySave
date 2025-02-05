<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;

// Route untuk halaman Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile');

Route::get('/finansial', [FinansialController::class, 'index'])->name('finansial');

Route::get('/guide', [GuideController::class, 'index'])->name('guide');

// Route untuk halaman index wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');

// Route untuk halaman create wishlist
Route::get('/wishlist/create', [WishlistController::class, 'create'])->name('wishlist.create');

// Route untuk menyimpan data wishlist baru
Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');

// Route untuk halaman edit wishlist
Route::get('/wishlist/{id}/edit', [WishlistController::class, 'edit'])->name('wishlist.edit');

// Route untuk memperbarui data wishlist
Route::put('/wishlist/{id}', [WishlistController::class, 'update'])->name('wishlist.update');

// Route untuk menghapus data wishlist
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');