<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('admin.pages.dashboard');
    })->name('admin-dashboard');

    Route::get('/registration', function () {
        return view('admin.pages.registration');
    })->name('admin-registration');

    Route::get('/participant', function () {
        return view('admin.pages.participant');
    })->name('admin-participant');

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
