<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikedMusicController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Auth Routes
// spatie rollarni guruhlab barish

// guest mehmon lar uchun manzillar
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form'); # login sahifasini chiqarish
    Route::post('/login', [AuthController::class, 'login'])->name('login'); # login forma uchun
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form'); # royxatdan otishni chiqarish
    Route::post('/register', [AuthController::class, 'register'])->name('register'); # royxatdan otish formasi uchun
    Route::get('/', [AuthController::class, 'guest'])->name('home'); # asosiy sahifa
});



// User Routes role user yani oddiy foydalanuvchilar uchun mavjud urllar
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-home', [UserController::class, 'index'])->name('user.home'); # user home sahifasi
    Route::get('/music', [MusicController::class, 'index'])->name('music.index'); # musicalar sahifasini asosiy qismi
    Route::post('/music', [MusicController::class, 'store'])->name('music.store'); # musiqa saqlash uchun forma
    Route::delete('/music/{id}', [MusicController::class, 'destroy'])->name('music.destroy'); # musiqani ochirish uchun forma
    Route::post('/music/{music}/like', [LikedMusicController::class, 'like'])->name('music.like'); # musiqaga layk bosish uchun forma
    Route::delete('/music/{music}/unlike', [LikedMusicController::class, 'unlike'])->name('music.unlike'); # musiqani dislike qilish uchun forma
    Route::get('/music/liked', [LikedMusicController::class, 'index'])->name('music.liked'); # like bosilgan musiqalarning sahifasi
});

// Admin Routes adminning ruhsatlari
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-home', [AdminController::class, 'index'])->name('admin.home'); # adminning asosiy sahifasi
});

//bitta bitta rollarni biriktirish
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth'); # ushbu manzil faqat auth lar yani royxatdan otganlar uchun ishlatiladi

Route::get('/music/search', [UserController::class, 'search'])->name('music.search')
    ->middleware('auth'); # qidirish faqat kirgan odamlar uchun ishlaydi

