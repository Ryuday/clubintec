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
// Pagina de Inicio
Route::get('/inicio', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
// Tabla de Datos (Usuarios)
Route::get('/inicio/datos', 'DatatablesController@anyUsersData')
->name('datatables.data');
// Registrar Usuario (Solo el Administrador)
Route::get('/{role}/nuevo', 'UserController@create')
    ->name('users.create');
// Metodo POST Registro de datos (Solo el Administrador)
Route::post('/inicio', 'UserController@store');
// Ver Datos del Usuario
Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');
// Actualizar Datos del Usuario
Route::get('/usuarios/{user}/editar', 'UserController@edit')
    ->name('users.edit');
// Metodo PUT Actualizando los Datos
Route::put('/usuarios/{user}', 'UserController@update')
    ->name('users.update');
// Pagina para enviar mensajes al correo del sistema
// (Contacto con el administrador atravez del sistema)
Route::get('contacto', 'ContactController@index')
    ->name('contact');
// Enviando correo al sistema
Route::post('contacto', 'ContactController@store')
    ->name('contact');
// Pagina de Inicio de los programas de estudios
Route::get('/pensum', 'PensumController@index')
    ->name('pensum');
// Tabla de Datos (Programas de Estudios)
Route::get('/pensum/datos', 'DatatablesController@anyPensumData')
    ->name('datatables.pensum');
// Verificación de E-mail
Route::get('registro/verificacion/{code}','VerifyEmailController@verify')
    ->name('verifyEmail');
// Registrar Programa (Solo el Administrador)
Route::get('{role}/programa/nuevo', 'PensumController@create')
    ->name('pensums.create');
