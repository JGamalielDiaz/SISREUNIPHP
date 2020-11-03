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
Route::get('registro','EstudiantePost@index')->name('student.Iregistro')->middleware('can:student.Iregistro');
Route::post('/registroadd','EstudiantePost@store')->name('student.store');

Route::get('Cuar/{id}','EstudiantePost@getRoom');
Route::get('Mun/{id}','EstudiantePost@getMunicipio');



//Modulo Eliminar y Actualizar
Route::get('student/getdata','EstudiantePost@getData')->name('student.getData');

//seccion Actualizar
Route::get('EstuList','EstudiantePost@getEstuInfo')->name('student.Iedit')->middleware('can:student.Iedit');
Route::post('student/update/{id}','EstudiantePost@edit')->name('student.Edit');

//Seccion Eliminar

//USUARIO
Route::get('usuario','UserController@create')->name('user.create')->middleware('can:user.create');

Route::post('usuario','UserController@store')->name('user.store');

Route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('can:users.edit');

Route::put('users/{user}','UserController@update')->name('users.update');


Route::get('users/show','UserController@index')->name('users.show')->middleware('can:users.show');


//ROLES Y PERMISOS

Route::get('rolPermission','RolPermissionController@create')->name('roles.create')->middleware('can:roles.create');

Route::post('roladd','RolPermissionController@store')->name('role.store');

Route::get('roles/show','RolPermissionController@index')->name('roles.show')->middleware('can:roles.show');

Route::get('roles/{role}/edit','RolPermissionController@edit')->name('roles.edit')->middleware('can:roles.edit');

Route::put('roles/{role}','RolPermissionController@update')->name('roles.update');


//CALENDARIO ASIGNACIONES
Route::get('RolesAseo','CalendarioController@index')->name('Asignaciones');
Route::get('EventCalendar','CalendarioController@EventCalendar');
Route::get('AsigancionCuarto/{fechaInicial}/{fechafinal}/{id}','CalendarioController@showRolesCuarto')->name('RolesPorCuarto.cuaNumero');
//Route::get('DetalleAseo/{Cua_ID}/{asig_ID}','CalendarioController@show');
Route::get('Cumplimiento/{asigID}','CalendarioController@verificarCumplimiento');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

