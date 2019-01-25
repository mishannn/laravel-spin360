<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', 'MainController@home')->name('home');
Route::get('/spin/{name}', 'MainController@spin')->where(['name' => '[a-zA-Z0-9]+'])->name('spin');

Route::get('/login', 'LoginController@loginForm')->name('login');
Route::post('/login', 'LoginController@loginAction');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');

    Route::get('/upload', 'AdminController@uploadForm')->name('upload');
    Route::post('/upload', 'AdminController@uploadAction');

    Route::get('/delete/{name}', 'AdminController@deleteSpin')->where(['name' => '[a-zA-Z0-9]+'])->name('delete');
});