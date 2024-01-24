<?php

use App\Http\Controllers\Admin\ParticipantController;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('admin.pages.dashboard');
    })->name('admin-dashboard');

    Route::get('/registration', function () {
        return view('admin.pages.registration');
    })->name('admin-registration');

    Route::controller(ParticipantController::class)->group(function () {
        Route::get('/participant', 'index')->name('admin-participant');
        Route::get('/participant/{id}', 'details')->name('admin-participant-details');
    });

    Route::get('/reservation', function () {
        return view('admin.pages.reservation');
    })->name('admin-reservation');

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
