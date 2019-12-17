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

//Inicio
Route::get('/', 'HomeController@index')->name('home');

// Registro de usuarios
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Autentificación de usuarios.
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Perfil de usuario
Route::get('profile', 'UserController@show')->name('profile');
Route::get('profile/{user}/edit', 'UserController@edit')->name('users.edit');
Route::patch('profile/{user}/update',  'UserController@update')->name('users.update');
Route::get('profile/download/{file}',  'UserController@downloadCv')->name('users.downloadcv');

Route::resource('categories', 'EmploymentCategoryController');
Route::resource('joboffers', 'JobOfferController');
Route::resource('candidature', 'CandidatureController');
//403
Route::get('unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


Route::fallback(function () {
    return "No permitido";
});
