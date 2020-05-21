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

/* Proteger rutas mediante roles
Route::group(['middleware' => 'role:super-admin|moderator'], function () {
    Route::resource('usuarios', 'UserController');
});
*/

// Proteger rutas mediante permisos
Route::group(['middleware' => 'role:super-admin|moderator|editor'], function () {
    Route::resource('usuarios', 'UserController');
    Route::resource('permisos', 'PermisosController');
    Route::resource('roles', 'RolsController');
});