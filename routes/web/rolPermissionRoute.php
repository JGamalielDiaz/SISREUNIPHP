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

//ROLES Y PERMISOS

Route::get('rolPermission','RolPermissionController@create')->name('roles.create')->middleware('can:roles.create');

Route::post('roladd','RolPermissionController@store')->name('role.store');

Route::get('roles/show','RolPermissionController@index')->name('roles.show')->middleware('can:roles.show');

Route::get('roles/{role}/edit','RolPermissionController@edit')->name('roles.edit')->middleware('can:roles.edit');

Route::put('roles/{role}','RolPermissionController@update')->name('roles.update');