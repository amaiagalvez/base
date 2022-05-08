<?php

use Illuminate\Support\Facades\Route;


Route::get('/{locale}', function ($locale = null) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return back();
})->where('locale', 'eu|es|en|fr');

Route::get('/', function () {

    return redirect()->to('bas/login');
})->name('home');

Route::get('/packages', function () {
    $packs = [
        [
            'image' => asset('storage/images/logo.jpg'),
            'name' => 'Base',
            'description' => 'Pakete orokorra. Eskaintzen digu erabiltzaile eta rolen kudeaketa.',
            'link' => route('base::packages.base')
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

    return view('base::packages.index', compact('packs'));
})->name('packages.index');


Route::get('/packages/base', function () {
    return view('base::packages.base');
})->name('packages.base');
