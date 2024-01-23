<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('admin.pages.dashboard');
    })->name('admin-dashboard');

    Route::get('/participant', function () {
        return view('admin.pages.participant');
    })->name('admin-participant');

    Route::get('/reservation', function () {
        return view('admin.pages.reservation');
    })->name('admin-reservation');
});
