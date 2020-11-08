<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//USUARIO
Route::get('usuario','UserController@create')->name('user.create')->middleware('can:user.create');

Route::post('usuario','UserController@store')->name('user.store');

Route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('can:users.edit');

Route::put('users/{user}','UserController@update')->name('users.update');


Route::get('users/show','UserController@index')->name('users.show')->middleware('can:users.show');