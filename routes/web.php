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
//403
Route::get('unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


Route::fallback(function () {
    return "No permitido";
});

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

// Categorias
//Route::resource('categories', 'EmploymentCategoryController');
Route::get('categories','EmploymentCategoryController@index')->name('categories.index');
Route::post('categories','EmploymentCategoryController@store')->name('categories.store');
Route::get('categories/create','EmploymentCategoryController@create')->name('categories.create');
Route::get('categories/search','EmploymentCategoryController@search')->name('categories.search');
Route::delete('categories/{category}','EmploymentCategoryController@destroy')->name('categories.destroy');
Route::put('categories/{category}','EmploymentCategoryController@update')->name('categories.update');
Route::patch('categories/{category}','EmploymentCategoryController@update')->name('categories.update');
Route::get('categories/{category}','EmploymentCategoryController@show')->name('categories.show');
Route::get('categories/{category}/edit','EmploymentCategoryController@edit')->name('categories.edit');

//Ofertas de trabajo
//Route::resource('joboffers', 'JobOfferController');
Route::get('joboffers','JobOfferController@index')->name('joboffers.index');
Route::post('joboffers','JobOfferController@store')->name('joboffers.store');
Route::get('joboffers/create','JobOfferController@create')->name('joboffers.create');
Route::get('joboffers/search','JobOfferController@search')->name('joboffers.search');
Route::delete('joboffers/{joboffer}','JobOfferController@destroy')->name('joboffers.destroy');
Route::post('joboffers/{joboffer}','JobOfferController@active')->name('joboffers.active');
Route::put('joboffers/{joboffer}','JobOfferController@update')->name('joboffers.update');
Route::patch('joboffers/{joboffer}','JobOfferController@update')->name('joboffers.update');
Route::get('joboffers/{joboffer}','JobOfferController@show')->name('joboffers.show');
Route::get('joboffers/{joboffer}/edit','JobOfferController@edit')->name('joboffers.edit');
Route::get('joboffers/{joboffer}/manage','JobOfferController@manage')->name('joboffers.manage');
Route::get('joboffers/{joboffer}/managecandidates','JobOfferController@managecandidates')->name('joboffers.managecandidates');


//Candidaturas
//Route::resource('candidature', 'CandidatureController');
Route::post('candidature','CandidatureController@store')->name('candidature.store');
Route::get('candidature/create','CandidatureController@create')->name('candidature.create');
Route::delete('candidature/{candidature}','CandidatureController@destroy')->name('candidature.destroy');
Route::put('candidature/{candidature}','CandidatureController@update')->name('candidature.update');
Route::patch('candidature/{candidature}','CandidatureController@update')->name('candidature.update');
Route::get('candidature/{candidature}','CandidatureController@show')->name('candidature.show');
Route::get('candidature/{candidature}/edit','CandidatureController@edit')->name('candidature.edit');
Route::patch('candidature/{candidature}/{user}/{status}','CandidatureController@changestatus')->name('candidature.changestatus');

//Inicio
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search/','HomeController@search')->name('home.search');
Route::get('/{category}','HomeController@searchCategory')->name('home.searchcategory');


