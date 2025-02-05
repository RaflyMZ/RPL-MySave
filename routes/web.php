<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;

// Route untuk halaman Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile');

Route::get('/finansial', [FinansialController::class, 'index'])->name('finansial');
Route::get('/guide', [GuideController::class, 'index'])->name('guide');
