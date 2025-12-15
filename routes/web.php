<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserManagementController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest', 'rate.limit:5,15']); // 5 attempts per 15 minutes

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('admin.registration')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['admin.registration', 'rate.limit:3,60']); // 3 attempts per hour

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');
});

// Guru Routes
Route::middleware(['auth', 'guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'index'])->name('dashboard');
    Route::get('/create', [GuruController::class, 'create'])->name('create');
    Route::post('/', [GuruController::class, 'store'])
        ->middleware(['rate.limit:5,60']); // 5 course creations per hour
    Route::get('/{product}', [GuruController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [GuruController::class, 'edit'])->name('edit');
    Route::put('/{product}', [GuruController::class, 'update'])->name('update');
    Route::delete('/{product}', [GuruController::class, 'destroy'])->name('destroy');
});


// Murid Routes (Default Dashboard)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/purchase/{product}', [DashboardController::class, 'purchase'])->name('purchase');
    Route::get('/class/{product}', [DashboardController::class, 'showClass'])->name('class.detail');
    Route::get('/preview/{product}', [DashboardController::class, 'previewCourse'])->name('course.preview');
});

// Fallback for SPA-like behavior
Route::fallback(function () {
    return redirect('/');
});