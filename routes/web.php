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

// Authentication Routes...
$this->get('iniciar/sesion', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('iniciar/sesion', 'Auth\LoginController@login');
$this->post('cerrar/sesion', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('registrar', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('registrar', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('contraseña/restablecer', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('contraseña/correo', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('contraseña/restablecer/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('contraseña/restablecer', 'Auth\ResetPasswordController@reset');

Route::get('/inicio', 'HomeController@index')->name('home');

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
