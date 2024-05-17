<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\MerchantController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
  return redirect('admin/dashboard');
});

Route::match(['get','post'],'login',[AdminLoginController::class, 'login'])->name('admin.login');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


// Authenticated admin routes
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [AdminLoginController::class, 'index'])->name('admin.dashboard');
    Route::get('merchants', [MerchantController::class, 'index'])->name('admin.dashboard');

});