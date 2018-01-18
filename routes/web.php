<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios/{user}', 'HomeController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/{user}/editar', 'HomeController@edit')
    ->name('users.edit');
