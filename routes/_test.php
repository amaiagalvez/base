<?php

use Amaia\Base\Models\Note;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/test', function () {
    $notes = Note::take(1)->get();

    return view('base::_tests.test', ['notes' => $notes]);
})->name('test');
