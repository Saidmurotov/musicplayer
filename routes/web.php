<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikedMusicController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/', [AuthController::class, 'guest'])->name('home');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// User Routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-home', [UserController::class, 'index'])->name('user.home');
    Route::get('/music', [MusicController::class, 'index'])->name('music.index');
    Route::get('/music/search', [UserController::class, 'search'])->name('music.search');
    Route::post('/music', [MusicController::class, 'store'])->name('music.store');
    Route::delete('/music/{id}', [MusicController::class, 'destroy'])->name('music.destroy');
    Route::post('/music/{music}/like', [LikedMusicController::class, 'like'])->name('music.like');
    Route::delete('/music/{music}/unlike', [LikedMusicController::class, 'unlike'])->name('music.unlike');
    Route::get('/music/liked', [LikedMusicController::class, 'index'])->name('music.liked');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/music/search', [UserController::class, 'search'])->name('music.search');
});

