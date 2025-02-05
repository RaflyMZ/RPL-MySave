<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinansialController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\HomeController;

// Route untuk halaman Home
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('editProfile');

Route::get('/finansial', [FinansialController::class, 'index'])->name('finansial');

Route::get('/expenditure', [ExpenditureController::class, 'index'])->name('expenditure');
Route::get('/expenditure/form', [ExpenditureController::class, 'form'])->name('expenditure.form');
Route::post('/expenditure/form/add', [ExpenditureController::class, 'add'])->name('expenditure.form.add');
Route::post('/expenditure/form/edit', [ExpenditureController::class, 'edit'])->name('expenditure.form.edit');
Route::post('/expenditure/form/delete', [ExpenditureController::class, 'delete'])->name('expenditure.form.delete');

Route::get('/guide', [GuideController::class, 'index'])->name('guide');
