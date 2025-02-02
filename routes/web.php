<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman Home
Route::get('/', function () {
    return view('home'); // Mengarahkan ke file home.blade.php
})->name('home');
