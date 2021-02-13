<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/update/icon', 'HomeController@updateIcon') -> name('update-icon');

Route::get('/delete/icon', 'HomeController@deleteIcon') -> name('delete-icon');
