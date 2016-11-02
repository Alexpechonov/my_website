<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('reference', 'Account\ReferenceController', ['only' => [
    'create', 'store', 'update', 'destroy'
]]);

Route::resource('post', 'Account\PostController', ['only' => [
    'create', 'store', 'update', 'destroy'
]]);

Route::group(['middleware' => ['admin', 'web']], function () {
    Route::get('/update-teachers', function () {
        //..//
    });
});