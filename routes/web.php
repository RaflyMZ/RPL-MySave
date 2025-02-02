<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;

// Route untuk halaman Home
Route::get('/', function () {
    return view('home'); // Mengarahkan ke file home.blade.php
})->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile');

Route::get('/finansial', [FinansialController::class, 'index'])->name('finansial');
