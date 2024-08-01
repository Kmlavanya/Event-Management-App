<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Registerusercontroller;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');




Auth::routes(); 


Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/view-users', [AdminController::class, 'viewUsers'])->name('admin.view-users');
   
    Route::get('/admin/add-event', [AdminController::class, 'showAddEventForm'])->name('admin.add-event');
    Route::post('/admin/add-event', [AdminController::class, 'storeEvent'])->name('admin.store-event');

    Route::get('/admin/view-events', [AdminController::class, 'viewEvents'])->name('admin.view-events');

    Route::get('/admin/view-eventbooker/{eventId}', [AdminController::class, 'viewEventBookers'])->name('admin.viewEventBooker');
    Route::get('/admin/fetch-eventbooker/{eventId}', [AdminController::class, 'fetchEventBookers'])->name('admin.fetchEventBookers');



// });

// Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/buy-tickets', [UserController::class, 'showBuyTickets'])->name('user.buy-tickets');
   
Route::get('/register/{eventId}', [Registerusercontroller::class, 'showForm'])->name('user.register');
Route::post('/register', [Registerusercontroller::class, 'store'])->name('register.store');

Route::get('users-export', [AdminController::class, 'export'])->name('users.export');
Route::post('users-import', [AdminController::class, 'import'])->name('users.import');

// });

