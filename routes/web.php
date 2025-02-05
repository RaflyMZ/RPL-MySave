<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Route untuk halaman Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Route untuk Profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/upload', [ProfileController::class, 'uploadPhoto'])->name('profile.upload');
Route::delete('/profile/delete-photo', [ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');

// Route untuk Finansial
Route::get('/finansial', [FinansialController::class, 'index'])->name('finansial');
Route::get('/finansial/tambah', [FinansialController::class, 'tambah'])->name('finansial.tambah');
Route::post('/finansial', [FinansialController::class, 'store'])->name('finansial.store');
Route::get('/finansial/edit/{id}', [FinansialController::class, 'edit'])->name('finansial.edit');
Route::put('/finansial/{id}', [FinansialController::class, 'update'])->name('finansial.update');
Route::delete('/finansial/{id}', [FinansialController::class, 'destroy'])->name('finansial.destroy');

// Route untuk Panduan (Guide)
Route::get('/guide', [GuideController::class, 'index'])->name('guide');
