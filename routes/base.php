<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('base::dashboard');
})->name('dashboard');
