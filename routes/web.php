<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

// Route for the main page
Route::get('/', function() {
    return view('welcome');
})->name('home');

// Route to display login page
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route to display registration page 
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// Route to display admin login page
// Route::get('/admin-login', function () {
//     return view('auth.admin-login');
// })->name('admin.login');

// Routes for login and registration processes
// Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::post('/register', [AuthController::class, 'register'])->name('register.post');
// Route::post('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.login.post');

// Route for logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
// Route::post('/admin-logout', [AuthController::class, 'adminLogout'])->name('admin.logout')->middleware('auth');

// Routes for password reset
// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->name('password.request');
// Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

// OTP
// Route::get('/otp-verify', function () {
//     return view('auth.otp-verify');
// })->name('otp.verify');
// Route::post('/otp-verify', [AuthController::class, 'verifyOTP'])->name('otp.verify.post');

// Reset Password
// Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
// Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

// Admin and User Dashboard routes
// Route::get('/admin', function () {
//     return view('auth.dashboard');
// })->name('admin.dashboard');

// Route::get('/user', function () {
//     return view('auth.user');
// })->name('user.dashboard');

// Middleware
// Route::middleware('admin')->group(function () {
//     Route::get('/admin', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
// });
// Route::middleware('auth')->group(function () {
//     Route::middleware('user')->group(function () {
//         Route::get('/user', [AuthController::class, 'showUserDashboard'])->name('user.dashboard');
//     });
// });

// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
// });

// Route::middleware(['user'])->group(function () {
//     Route::get('/user', [AuthController::class, 'showUserDashboard'])->name('user.dashboard');
// });

// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin', [AuthController::class, 'showAdminDashboard'])->name('admin.dashboard');
// });

// User Dashboard route
// Route::middleware(['user'])->group(function () {
//     Route::get('/user', [AuthController::class, 'showUserDashboard'])->name('user.dashboard');
// });


// Route::get('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.login');
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AuthController::class, 'showTable'])->name('admin.dashboard');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/user/dashboard', function () {
//         return view('auth.user');
//     })->name('user.dashboard');
// });

// Route::redirect('/');

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
