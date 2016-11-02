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

Route::post('/reference/create', [
    'as' => 'reference.store',
    'uses' => 'Account\ReferenceController@store',
]);

Route::post('/post/create', [
    'as' => 'post.store',
    'uses' => 'Account\PostController@store',
]);

Route::group(['middleware' => ['admin', 'web']], function () {
    Route::get('/update-teachers', function () {
        //..//
    });
});