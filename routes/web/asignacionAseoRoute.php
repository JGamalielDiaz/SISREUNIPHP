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

//CALENDARIO ASIGNACIONES

Route::get('RolesAseo','CalendarioController@index')->name('Asignaciones');

Route::get('EventCalendar','CalendarioController@EventCalendar');

Route::get('AsigancionCuarto/{fechaInicial}/{fechafinal}/{id}','CalendarioController@showRolesCuarto')->name('RolesPorCuarto.cuaNumero');

//Route::get('DetalleAseo/{Cua_ID}/{asig_ID}','CalendarioController@show');
Route::get('Cumplimiento/{asigID}','CalendarioController@verificarCumplimiento');