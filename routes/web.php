<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-agen', function () {
    return view('listAgen');
});

Route::get('/hasil-panen', function () {
    return view('hasilpanenTani');
});
