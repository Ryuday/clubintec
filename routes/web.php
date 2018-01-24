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

use Illuminate\Support\Facades\Mail;
use \App\Mail\EmailUser;

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

Route::get('contacto', 'ContactController@index')
    ->name('contact');

Route::post('contacto', 'ContactController@store')
    ->name('contact');
/*
Route::get('email', function ()
{
  //Mail::to('clubintec@gmail.com')->send(new \App\Mail\EmailUser());
  return new \App\Mail\EmailUser('Elio Mayz');
})->name('email');
*/
Route::post('email', function (Request $request)
{
  Mail::to('clubintec@gmail.com')->send(new \App\Mail\EmailUser($request->name));
})->name('message');
