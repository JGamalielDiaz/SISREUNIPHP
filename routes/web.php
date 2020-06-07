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

//RUTAS Autenticacion

Route::get('/','Auth\LoginController@showLoginForm');

Route::post('Login','Auth\LoginController@login')->name('login');

Route::post('Logout','Auth\LoginController@logout')->name('logout');

//Rutas 

//ModuloRegistro
Route::get('registro','EstudiantePost@index')->name('student.Iregistro');
Route::post('/registroadd','EstudiantePost@store')->name('student.store');

Route::get('Cuar/{id}','EstudiantePost@getRoom')->name('student.getRoom');
Route::get('Mun/{id}','EstudiantePost@getMunicipio')->name('student.getMunicipio');



//Modulo Eliminar y Actualizar
Route::get('student/getdata','EstudiantePost@getData')->name('student.getData');

//seccion Actualizar
Route::get('EstuList','EstudiantePost@getEstuInfo')->name('student.Iedit');
Route::post('student/update/{id}','EstudiantePost@edit')->name('student.Edit');

//Seccion Eliminar

Route::get('usuario','AdminController@create')->name('admin.UserRegister');

Route::post('usuario','AdminController@store')->name('admin.UserRegister');

Route::get('rolPermission','RolPermissionController@create')->name('admin.RolRegister');

Route::post('roladd','RolPermissionController@store')->name('admin.Roladd');

//CALENDARIO ASIGNACIONES
Route::get('RolesAseo','CalendarioController@index')->name('Asignaciones');
Route::get('EventCalendar','CalendarioController@EventCalendar');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

