<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\ProfileController;

// route for login
Route::get('/', function () {
    return view('auth.login');
});

// route for dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route for urls
Route::resource('urls', UrlController::class)
    ->middleware(['auth', 'verified']);

// route for profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route for get shortener url (with prefix)
Route::get('/short/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

require __DIR__ . '/auth.php';
