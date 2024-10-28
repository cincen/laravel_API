<?php

use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DataController::class);
