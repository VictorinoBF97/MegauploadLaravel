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

// Páginas estáticas
Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact')->middleware('auth');
Route::get('/about', 'PagesController@about')->name('about');

// Rutas para la entidad Files
Route::resource('/files', 'FilesController');

// Rutas de autentificación
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Rutas Archivo-Usuario
Route::get('/users/{user}/files', 'UserFilesController@index')->name('userfiles.index');


