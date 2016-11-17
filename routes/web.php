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

Route::get('/', 'HomeController@mainPage')->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('account');
});

Route::resource('reference', 'Account\ReferenceController', ['only' => [
    'create', 'store', 'destroy',
]]);

Route::get('/references', 'Account\ReferenceController@index');

Route::resource('post', 'Account\PostController', ['only' => [
    'create', 'store', 'update', 'destroy',
]]);


Route::group(['middleware' => ['admin', 'web']], function () {
    Route::get('/update-groups', 'Account\AdminController@updateGroups');
    Route::post('/groups/update', 'Account\AdminController@postUpdateGroups')->name('groups.update');
});
