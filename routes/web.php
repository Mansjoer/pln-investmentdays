<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('app-register');
});

Route::get('/register', function () {
    return redirect()->route('app-register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::controller(TicketController::class)->group(function () {
    Route::get('/ticket/{code}', 'index')->name('app-ticket');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/registration', 'register')->name('app-register');
    Route::get('/register/verify/{token}', 'verify')->name('app-verify');
});

Route::controller(ReservationController::class)->group(function () {
    Route::get('/reservation', 'index')->name('app-reservation');
});

Route::get('/email-template', function () {
    $name = 'nama';
    $code = '';
    $isJoin = 0;
    return view('mail.sendTicket', compact('name', 'code', 'isJoin'));
});
