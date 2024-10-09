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
Route::get('/guests', 'GuestController@index')->name('guest.index');
Route::get('/guests/create', 'GuestController@create')->name('guests.create');
Route::post('/guests', 'GuestController@store')->name('guests.store');
Route::post('/guests/{id}/checkout', 'GuestController@checkout')->name('guests.checkout');