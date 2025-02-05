<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;

// Route untuk halaman Home
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
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
Route::post('/finansial/target/save', [FinansialController::class, 'setTarget'])->name('finansial.target.save');
Route::get('/finansial/target/reset', [FinansialController::class, 'resetTarget'])->name('finansial.target.reset');

//  Route untuk Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/wishlist/create', [WishlistController::class, 'create'])->name('wishlist.create');
Route::post('/wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist/{id}/edit', [WishlistController::class, 'edit'])->name('wishlist.edit');
Route::put('/wishlist/{id}', [WishlistController::class, 'update'])->name('wishlist.update');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

// Route untuk Expenditure
Route::get('/expenditure', [ExpenditureController::class, 'index'])->name('expenditure');
Route::get('/expenditure/form', [ExpenditureController::class, 'form'])->name('expenditure.form');
Route::post('/expenditure/form/add', [ExpenditureController::class, 'add'])->name('expenditure.form.add');
Route::post('/expenditure/form/edit', [ExpenditureController::class, 'edit'])->name('expenditure.form.edit');
Route::post('/expenditure/form/delete', [ExpenditureController::class, 'delete'])->name('expenditure.form.delete');

Route::get('/guide', [GuideController::class, 'index'])->name('guide');

