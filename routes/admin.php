<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\ReservationController;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.pages.dashboard');
    });

    Route::get('/registration', function () {
        return view('admin.pages.registration');
    })->name('admin-registration');

    Route::controller(ParticipantController::class)->group(function () {
        Route::get('/participant', 'index')->name('admin-participant');
        Route::get('/participant/{id}', 'details')->name('admin-participant-details');
    });

    Route::controller(ReservationController::class)->group(function () {
        Route::get('/reservation', 'index')->name('admin-reservation');
        Route::get('/reservation/{id}', 'details')->name('admin-reservation-details');
    });

    Route::get('/ticket', function () {
        return view('admin.pages.ticket');
    })->name('admin-ticket');

    Route::get('/user', function () {
        return view('admin.pages.user');
    })->name('admin-user');

    Route::prefix('/bilateral')->group(function () {
        Route::get('/schedule', function () {
            return view('admin.pages.bilateral.schedule');
        })->name('admin-bilateral-schedule');
    });
});
