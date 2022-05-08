<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return redirect()->route('login');
})->name('home');

Route::get('/packages', function () {
    $packs = [
        [
            'image' => asset('storage/images/logo.jpg'),
            'name' => 'Base',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/code.jpg'),
            'name' => 'Base2',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/logo_small.jpg'),
            'name' => 'Base3',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/marguerite.jpg'),
            'name' => 'Base4',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/tissue.jpg'),
            'name' => 'Base5',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/code.jpg'),
            'name' => 'Base6',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/logo.jpg'),
            'name' => 'Base',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/code.jpg'),
            'name' => 'Base2',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/logo_small.jpg'),
            'name' => 'Base3',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/marguerite.jpg'),
            'name' => 'Base4',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/tissue.jpg'),
            'name' => 'Base5',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
        [
            'image' => asset('storage/images/code.jpg'),
            'name' => 'Base6',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => '#'
        ],
    ];

    return view('base::packages', compact('packs'));
})->name('packages');
