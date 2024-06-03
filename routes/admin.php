<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\OrderController;



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
    Route::get('merchants', [MerchantController::class, 'index'])->name('admin.merchants');

    Route::get('merchant-applications', [ApplicationController::class, 'index'])->name('admin.merchantapplications');

    Route::resource('admin-users', App\Http\Controllers\Admin\AdminController::class)
    ->names([
      'index' =>'admin.admin-list',
      'create' => 'admin.admin-create',
      'store' => 'admin.admin-store',
      'destroy' => 'admin.admin-destroy',
      'edit' => 'admin.admin-edit',
      'update' => 'admin.admin-update'
    ]);

    Route::get('merchant-application/{id}',[ApplicationController::class,'viewApplication'])->name('admin.viewapplication');
    Route::post('application-status-change/{id}',[ApplicationController::class,'statusUpdate'])->name('admin.application-status-change');

    Route::get('orders',[OrderController::class,'index'])->name('admin.orders.index');
   
});