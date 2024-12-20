<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('guests', GuestController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('guests', GuestController::class);
});
Route::resource('rooms', RoomController::class);
Route::post('reservations/{id}/checkout', [ReservationController::class, 'checkout'])->name('reservations.checkout');
Route::resource('reservations', ReservationController::class);
Route::post('/',[GuestController::class, 'store'])->name('from.store');
Route::get('/dashboard',[App\Http\Controllers\HomeController::class, 'index'])->name('dashboard'); 
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/index', [GuestController::class,'index'])->name('guests.index');
Route::post('/store', [GuestController::class, 'store'])->name('guests.store');
Route::post('/guests/{id}/checkout', [GuestController::class, 'checkout'])->name('guests.checkout');
Route::get('/guests/{id}/edit', [App\Http\Controllers\GuestController::class, 'edit'])->name('guests.edit');
Route::put('/guests/{id}', [App\Http\Controllers\GuestController::class, 'update'])->name('guests.update');

Route::get('/admin', function () {
    // ...
})->middleware(['auth', 'admin']);
// routes/web.php
Route::delete('/items/{id}', [GuestController::class, 'destroy'])->name('destroy');
use App\Http\Controllers\AdminAuthController;

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('auth');