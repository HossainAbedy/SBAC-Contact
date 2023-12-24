<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\ContactController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\ContactController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/store', [App\Http\Controllers\ContactController::class, 'store'])->middleware(['auth', 'verified'])->name('contacts.store');
Route::get('/create', [App\Http\Controllers\ContactController::class, 'create'])->middleware(['auth', 'verified'])->name('contacts.create');
Route::get('/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->middleware(['auth', 'verified'])->name('contacts.edit');
Route::put('/update/{id}', [App\Http\Controllers\ContactController::class, 'update'])->middleware(['auth', 'verified'])->name('contacts.update');
Route::delete('/delete/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->middleware(['auth', 'verified'])->name('contacts.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
