<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin{any}', function () {
    return view('back');
})->where('any', '(.*)?');


Route::get('/membre{any}', function () {
    return view('member');
})->where('any', '(.*)?');

Route::any('/{any}', function () {
    return view('front');
})->where('any', '(.*)?');
