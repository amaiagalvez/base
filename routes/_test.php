<?php

use Amaia\Base\Models\Note;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/cards', function () {
    $notes = Note::take(1)->get();

    return view('base::_tests.test', ['notes' => $notes]);
})->name('test.cards');


Route::get('/home', function () {
    return view('base::_tests.home');
})->name('test.home');
