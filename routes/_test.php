<?php

use Amaia\Base\Models\Note;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    $notes = Note::take(1)->get();

    return view('base::test', ['notes' => $notes]);
})->name('test');

//include 'vendor/laravel/fortify/routes/routes.php';
