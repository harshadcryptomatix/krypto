<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountSettingsController;

Route::prefix('admin')->group(function () {
    require base_path('routes/admin.php');
    // Route::view('dashboard', 'admin.dashboard');

});

Route::post('/register', [RegisterController::class, 'create'])->middleware(['guest'])->name('register');


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('verified')->name('dashboard');

Route::controller(VerificationController::class)->middleware('auth')->group(function() {
    // Route::get('/email/verify', 'notice')->name('verification.notice');
    // Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', 'resend')->middleware(['throttle:6,1'])->name('verification.resend');
});

Route::controller(AccountSettingsController::class)->middleware('auth')->prefix('account-settings')->group(function() {
    Route::get('/', 'getPage')->name('account-settitngs.page');
    Route::post('change-password', 'changePassword')->name('change-password');
});