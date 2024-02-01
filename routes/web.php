<?php

use App\Http\Controllers\EmailController;
use App\Models\Reservation;
use App\Mail\SendInvitation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;

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
    return redirect('https://staging.pln-investmentdays.com/');
});

Route::get('/register', function () {
    return redirect()->route('app-register');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth-login')->middleware(['guest']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('auth-login');
})->name('auth-logout')->middleware(['auth']);

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
    $name = 'name here';
    $position = 'position here';
    $company = 'company here';
    return view('mail.sendInvitation', compact('name', 'position', 'company'));
});


// Route::get('/send-email', function () {
//     $name = 'name here';
//     $position = 'position here';
//     $company = 'company here';
//     $email = 'sumailaricky@gmail.com';
//     Mail::mailer('invitation')->to($email)->send(new SendInvitation($name, $email, $position, $company));
//     return 'Email send successfully';
// });
