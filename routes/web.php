<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Route for the main page
Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // Routes for Authors
    Route::prefix('authors')->name('authors.')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index');
        Route::get('/create', [AuthorController::class, 'create'])->name('create');
        Route::post('/', [AuthorController::class, 'store'])->name('store');
        Route::get('/{id}', [AuthorController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AuthorController::class, 'update'])->name('update');
        Route::delete('/{id}', [AuthorController::class, 'destroy'])->name('destroy');
    });

    // Routes for Mobils
    Route::prefix('mobils')->name('mobils.')->group(function () {
        Route::get('/', [MobilController::class, 'index'])->name('index');
        Route::get('/create', [MobilController::class, 'create'])->name('create');
        Route::post('/', [MobilController::class, 'store'])->name('store');
        Route::get('/{id}', [MobilController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [MobilController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MobilController::class, 'update'])->name('update');
        Route::delete('/{id}', [MobilController::class, 'destroy'])->name('destroy');
    });

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('admin', function () {
        return view('auth.dashboard');
    })->middleware('can:admin')->name('admin');
    
    Route::get('user', function () {
        return view('auth.user');
    })->middleware('can:user')->name('user');
    
});

Route::middleware(['guest'])->group(function () {
    
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'store']);

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);

});


Route::get('forgot-password', function() {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot-password');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.store');
