<?php

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

Route::get('/', function () {
    return view('Layout/layout');
});



Route::get('Cuar/{id}','EstudiantePost@getRoom');

Route::get('registro','EstudiantePost@index')->name('registro');
Route::post('/registroadd','EstudiantePost@store')->name('EstuSave');
Route::get('Mun/{id}','EstudiantePost@getMunicipio');
Route::get('EstuList','EstudiantePost@getEstuInfo')->name('Listar');

Route::get('student/getdata','EstudiantePost@getData')->name('student.getdata');
Route::post('student/update/{id}','EstudiantePost@edit');

Route::get('calendar',function(){

    return view('viewCalendarAsignaciones');
})->name('calendarAsignacion');
