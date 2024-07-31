<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Auth::routes(); // This should register the default routes for login, registration, and password resets

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/view-users', [AdminController::class, 'viewUsers'])->name('admin.view-users');
   
    Route::get('/admin/add-event', [AdminController::class, 'showAddEventForm'])->name('admin.add-event');
    Route::post('/admin/add-event', [AdminController::class, 'storeEvent'])->name('admin.store-event');

    Route::get('/admin/view-events', [AdminController::class, 'viewEvents'])->name('admin.view-events');

// });

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});

