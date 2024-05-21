<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\ApplicationController;

Route::prefix('admin')->group(function () {
    require base_path('routes/admin.php');
    // Route::view('dashboard', 'admin.dashboard');

});

Route::post('/register', [RegisterController::class, 'create'])->middleware(['guest'])->name('register');


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile-info', [ApplicationController::class, 'profile_details'])->name('profile.details');
    Route::post('/profile-info-update', [ApplicationController::class, 'profile_save_info'])->name('save-personal-info');
   

});


Route::controller(VerificationController::class)->middleware('auth')->group(function() {
    // Route::get('/email/verify', 'notice')->name('verification.notice');
    // Route::get('/email/verify/{id}/{hash}', 'verify')->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', 'resend')->middleware(['throttle:6,1'])->name('verification.resend');
});

Route::controller(AccountSettingsController::class)->middleware('auth')->prefix('account-settings')->group(function() {
    Route::get('/', 'getPage')->name('account-settitngs.page');
    Route::post('change-password', 'changePassword')->name('change-password');
});