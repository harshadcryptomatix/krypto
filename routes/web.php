<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;

Route::prefix('admin')->group(function () {
    require base_path('routes/admin.php');
    // Route::view('dashboard', 'admin.dashboard');

});

// Auth::routes();
// Route::view('login', 'auth.login')->name('login');

Route::post('/register', [RegisterController::class, 'create'])->middleware(['guest'])->name('register');


Route::get('/', function () {
    return redirect()->route('dashboard');
    // return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('verified')->name('dashboard');

Route::controller(VerificationController::class)->middleware('auth')->group(function() {
    // Route::get('/email/verify', 'notice')->name('verification.notice');
    // Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', 'resend')->middleware(['throttle:6,1'])->name('verification.resend');
});
